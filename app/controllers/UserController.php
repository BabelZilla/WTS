<?php

/*
|--------------------------------------------------------------------------
| Confide Controller Template
|--------------------------------------------------------------------------
|
| This is the default Confide controller template for controlling user
| authentication. Feel free to change to your needs.
|
*/

class UserController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function testmail()
    {
        $data = array();
        $message = 'Only a test';
        Mail::send(array('emails.wts.devrequest.html', 'emails.wts.devrequest.txt'), $data, function ($message) {
            $message->subject('Message Subject');
            $message->from('noreply@babelzilla.org', 'BabelZilla');
            $message->to('juergen.berg@gmail.com', 'John Smith')->subject('Welcome!');
        });
    }

    /**
     * Displays the form for account creation
     *
     */
    public function create($data = false)
    {
        $providers = Config::Get('wts.providers');
        $view = array('providers' => $providers);
        $this->theme->asset()->container('header')->add('webicon_css', 'themes/babelzilla/assets/css/webicons.css');
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            ),
            array(
                'label' => 'Sign Up',
            )
        ));
        $this->theme->setTitle('Sign up');
        return $this->theme->of(Config::get('confide::signup_form'), $view)->render();
    }

    /**
     * Stores new account
     *
     */
    public function store()
    {
        $user = new User;

        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->password = Input::get('password');


        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $user->password_confirmation = Input::get('password_confirmation');

        // Save if valid. Password field will be hashed before save
        $user->save();

        if ($user->id) {
            $notice = Lang::get('confide::confide.alerts.account_created') . ' ' . Lang::get('confide::confide.alerts.instructions_sent');

            // Redirect with success message, You may replace "Lang::get(..." for your custom message.
            return Redirect::action('UserController@login')
                ->with('notice', $notice);
        } else {
            // Get validation errors (see Ardent package)
            $error = $user->errors()->all(':message');

            return Redirect::action('UserController@create')
                ->withInput(Input::except('password'))
                ->with('error', $error);
        }
    }

    /**
     * Displays the login form
     *
     */
    public function login()
    {
        if (Confide::user()) {
            // If user is logged, redirect to internal 
            // page, change it to '/admin', '/dashboard' or something
            return Redirect::to('/');
        } else {
            //return View::make(Config::get('confide::login_form'));
            $providers = Config::Get('wts.providers');
            $view = array('providers' => $providers);
            $this->theme->asset()->container('header')->add('webicon_css', 'themes/babelzilla/assets/css/webicons.css');
            $this->theme->breadcrumb()->add(array(
                array(
                    'label' => 'Home',
                    'url' => '/'
                ),
                array(
                    'label' => 'Login',
                )
            ));
            $this->theme->setTitle('Login');
            return $this->theme->of(Config::get('confide::login_form'), $view)->render();
        }
    }

    /**
     * Attempt to do login
     *
     */
    public function do_login()
    {
        $input = array(
            'email' => Input::get('email'), // May be the username too
            'username' => Input::get('email'), // so we have to pass both
            'password' => Input::get('password'),
            'remember' => Input::get('remember'),
        );

        // If you wish to only allow login from confirmed users, call logAttempt
        // with the second parameter as true.
        // logAttempt will check if the 'email' perhaps is the username.
        // Get the value from the config file instead of changing the controller
        if (Confide::logAttempt($input, Config::get('confide::signup_confirm'))) {
            // Redirect the user to the URL they were trying to access before
            // caught by the authentication filter IE Redirect::guest('user/login').
            // Otherwise fallback to '/'
            // Fix pull #145
            return Redirect::intended('/'); // change it to '/admin', '/dashboard' or something
        } else {
            $user = new User;

            // Check if there was too many login attempts
            if (Confide::isThrottled($input)) {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            } elseif ($user->checkUserExists($input) and !$user->isConfirmed($input)) {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            } else {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }

            return Redirect::action('UserController@login')
                ->withInput(Input::except('password'))
                ->with('error', $err_msg);
        }
    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string $code
     */
    public function confirm($code)
    {
        if (Confide::confirm($code)) {
            $notice_msg = Lang::get('confide::confide.alerts.confirmation');
            return Redirect::action('UserController@login')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
            return Redirect::action('UserController@login')
                ->with('error', $error_msg);
        }
    }

    /**
     * Displays the forgot password form
     *
     */
    public function forgot_password()
    {
        $view = array();
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            ),
            array(
                'label' => 'Forgot password',
            )
        ));
        $this->theme->setTitle('Forgot password');
        return $this->theme->of(Config::get('confide::forgot_password_form'), $view)->render();
    }

    /**
     * Attempt to send change password link to the given email
     *
     */
    public function do_forgot_password()
    {
        if (Confide::forgotPassword(Input::get('email'))) {
            $notice_msg = Lang::get('confide::confide.alerts.password_forgot');
            return Redirect::action('UserController@login')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
            return Redirect::action('UserController@forgot_password')
                ->withInput()
                ->with('error', $error_msg);
        }
    }

    /**
     * Shows the change password form with the given token
     *
     */
    public function reset_password($token)
    {
        $view = array('token' => $token);
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            ),
            'label' => 'Reset password',
        ));
        $this->theme->setTitle('Reset password');
        return $this->theme->of(Config::get('confide::reset_password_form'), $view)->render();
    }

    /**
     * Attempt change password of the user
     *
     */
    public function do_reset_password()
    {
        $input = array(
            'token' => Input::get('token'),
            'password' => Input::get('password'),
            'password_confirmation' => Input::get('password_confirmation'),
        );

        // By passing an array with the token, password and confirmation
        if (Confide::resetPassword($input)) {
            $notice_msg = Lang::get('confide::confide.alerts.password_reset');
            return Redirect::action('UserController@login')
                ->with('notice', $notice_msg);
        } else {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
            return Redirect::action('UserController@reset_password', array('token' => $input['token']))
                ->withInput()
                ->with('error', $error_msg);
        }
    }

    /**
     * Log the user out of the application.
     *
     */
    public function logout()
    {
        Confide::logout();

        return Redirect::to('/');
    }

    public function loginWithGoogle()
    {

        // get data from input
        $code = Input::get('code');

        // get google service
        $googleService = OAuth::consumer('Google');

        // check if code is valid

        // if code is provided get user data and sign in
        if (!empty($code)) {

            // This was a callback request from google, get the token
            $token = $googleService->requestAccessToken($code);

            // Send a request with it
            $result = json_decode($googleService->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);

            $message = ':-) Your unique Google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
            echo $message . "<br/>";
            $user = \User::where('email', '=', $result['email'])->get();
            //$this->create($data);
            print_r($user);
            $data = array(
                'email' => $result['email'],
                'given_name' => $result['given_name'],
                'family_name' => $result['family_name']
            );
            //return Redirect::route('registeruser');
            //->with('data', $data);
            if (!$user) {
                $data = array(
                    'email' => $result['email'],
                    'given_name' => $result['given_name'],
                    'family_name' => $result['family_name']
                );
                print_r($data);
                $this->create($data);
            }
            //Var_dump
            //display whole array().
            dd($result);


        } // if not ask for permission first
        else {
            // get googleService authorization
            $url = $googleService->getAuthorizationUri();

            // return to facebook login url
            return Redirect::to((string)$url);
        }
    }

    public function settings()
    {

        $view = array('name' => 'BZ');
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            ),
            array('label' => 'Your settings')
        ));
        // home.index will look up the path 'app/views/home/index.php'
        return $this->theme->of('user.settings', $view)->render();
    }

    public function profile($id = Null)
    {
        if (!$id) $id = Auth::user()->id;
        $user = User::find($id);
        $profile = $user->Profile()->get();
        $profiles = $user->profiles()->get();
        $projects = $user->Project()->count();
        $translations = $user->Translations()->count();
        $languages = $user->Languages()->get();
        $view = array('user' => $user,
            'profile' => $profile[0],
            'projects' => $projects,
            'translations' => $translations,
            'languages' => $languages,
        );
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            ),
            array('label' => 'Your profile')
        )); // home.index will look up the path 'app/views/home/index.php'

        $this->theme->setTitle('Profile view');
        return $this->theme->of('user.profile', $view)->render();
    }
}
