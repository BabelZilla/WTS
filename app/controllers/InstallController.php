<?php
use Illuminate\Database\Capsule\Manager as Capsule;

class InstallController extends \BaseController

{
    public function __construct()
    {
        parent::__construct();
        $this->theme = Theme::uses('installer')->layout('default');

    }

    protected $step;

    protected $validation;


    public function run()
    {
        $step = Input::get('step');

        $valid_steps = array('start', 'install_db', 'install_admin', 'install_config', 'update_db', 'success');
        if (!in_array($step, $valid_steps)) {
            $step = 'start';
        }

        $this->step = $step;

        $method = strtolower(Request::getMethod());
        $action = $method . '_' . $step;

        return $this->$action();
    }

    public function get_start()
    {

        $uploadFolder = Config::Get('wts.uploadFolder');
        $tempFolder = Config::Get('wts.tempFolder');
        $repoFolder = Config::Get('wts.repoFolder');
        $configWritable = File::isWritable(app_path() . '/config/');
        $tempWritable = File::isWritable($tempFolder);
        $repoWritable = File::isWritable($repoFolder);
        $uploadWritable = File::isWritable($uploadFolder);
        $noerror = ($uploadWritable && $repoWritable && $tempWritable && $configWritable);

        $view = array(
            'configWritable' => $configWritable,
            'tempWritable' => $tempFolder,
            'repoWritable' => $repoFolder,
            'uploadWritable' => $uploadWritable,
            'noerror' => $noerror,
        );
        return $this->theme->of('installer.start', $view)->render();
    }

    public function post_start()
    {
        $rules = array(
            // TODO: Verify language being valid
            'language' => 'required',
        );

        // TODO: Set bundle (for localization)
        if (!$this->validate($rules)) {
            return $this->redirectBack();
        }

        $this->remember('language', Input::get('language'));

        return $this->redirectTo('database');
    }

    public function get_install_db()
    {
        $view = array();
        return $this->theme->of('installer.install_db', $view)->render();
    }

    public function post_install_db()
    {
        $rules = array(
            'db_host' => 'required',
            'db_name' => 'required',
            'db_user' => 'required',
        );

        if (!$this->validate($rules)) {
            return $this->redirectBack();
        }

        $db_conf = array(
            'driver' => 'mysql', // FIXME
            'host' => Input::get('db_host'),
            'database' => Input::get('db_name'),
            'username' => Input::get('db_user'),
            'password' => Input::get('db_pass'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => Input::get('db_prefix'),
        );
        $link = mysql_connect(Input::get('db_host'), Input::get('db_user'), Input::get('db_pass'));
        if (!$link) {
            $sqlerr = mysql_error();
            return $this->redirectTo($this->step)
                ->withInput(Input::all())
                ->withErrors(['connect_error' => $sqlerr]);
        }
        $config = config::get('database');
        $config['default'] = 'mysql';
        $config['migrations'] = 'migrations';
        $config['connections']['mysql'] = $db_conf;

        $confDump = '<?php' . "\n\n" . 'return ' . var_export($config, true) . ';' . "\n";
        $confFile = app_path() . '/config/database.php';
        $success = File::put($confFile, $confDump);
        if (!$success) {
            throw new RuntimeException('Unable to write config file. Please create the file "' . $confFile . '" with the following contents:' . "\n\n" . $config);
        }

        try {
            Artisan::call('key:generate');
            Artisan::call('migrate:install');
            Artisan::call('migrate', [
                '--path'     => "app/database/migrations"
            ]);
            Artisan::call('db:seed');
        } catch (Exception $e) {
            return $this->redirectTo($this->step)
                ->withInput(Input::all())
                ->withErrors(['migrate_error' => $e->getMessage()]);
        }

        return $this->redirectTo('install_admin');
    }

    public function get_install_admin()
    {
        $view = array();
        return $this->theme->of('installer.install_admin', $view)->render();
    }

    public function post_install_admin()
    {

        $rules = array(
            'sendermail' => 'required|email',
            'sendername' => 'required',
            'username' => 'required|between:2,25',
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed',
        );

        if (!$this->validate($rules)) {
            return $this->redirectBack();
        }

        $sendermail = Input::get('sendermail');
        $sendername = Input::get('sendername');
        $sendmailpath = Input::get('sendmailpath', '/usr/sbin/sendmail -bs');

        $config = config::get('mail');
        $config['driver'] = 'mail';
        $from = array('address' => $sendermail, 'name' => $sendername);
        $config['from'] = $from;
        $config['sendmail'] = $sendmailpath;
        $confDump = '<?php' . "\n\n" . 'return ' . var_export($config, true) . ';' . "\n";
        $confFile = app_path() . '/config/mail.php';
        $success = File::put($confFile, $confDump);
        if (!$success) {
            throw new RuntimeException('Unable to write config file. Please create the file "' . $confFile . '" with the following contents:' . "\n\n" . $config);
        }

        $user_info = array(
            'username' => Input::get('username'),
            'email' => Input::get('email'),
            'password' => Input::get('password'),
        );

        Eloquent::unguard();

        $adminUser = new User(array(
            'username' => $user_info['username'],
            'password' => $user_info['password'],
            'email' => $user_info['email'],
        ));

        $adminUser->settings = serialize($this->usersettings);
        $adminUser->save();
        Eloquent::reguard();

        return $this->redirectTo('install_config');
    }

    public function get_install_config()
    {
        $view = array();
        return $this->theme->of('installer.install_config', $view)->render();
    }

    public function post_install_config()
    {
        $rules = array(
            'title' => 'required',
            'description' => 'required',
        );

        if (!$this->validate($rules)) {
            return $this->redirectBack();
        }

        $board_info = array(
            'title' => Input::get('title'),
            'description' => Input::get('description'),
        );

        /* TODO: Save the information */

        return $this->redirectTo('success');
    }

    public function get_upgrade_db()
    {
        // n.a.
    }

    public function post_upgrade_db()
    {
        //n.a.
    }

    public function get_run()
    {
        $view = array();
        return $this->theme->of('installer.run', $view)->render();
    }

    public function get_success()
    {
        $view = array();
        return $this->theme->of('installer.success', $view)->render();
    }


    protected function validate(array $rules)
    {
        $this->validation = Validator::make(Input::all(), $rules);
        return $this->validation->passes();
    }

    protected function redirectTo($step)
    {
        return Redirect::to(Request::url() . '?step=' . $step);
    }

    protected function redirectBack()
    {;
        return $this->redirectTo($this->step)
            ->withInput(Input::all())
            ->withErrors($this->validation->getMessageBag());
    }
}
