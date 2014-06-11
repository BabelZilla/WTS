<?php

class HomeController extends BaseController
{

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */
    public function __construct()
    {
        parent::__construct();
    }

    public function showWelcome()
    {
        $this->theme->asset()->container('footer')->add('hello_js', 'themes/babelzilla/assets/js/hello.js');
        //View::composer('hello', 'Fbf\LaravelNavigation\NavigationComposer');
        $view = array('name' => 'BZ');
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            )));
        \Iseed::generateSeed('users');
        // home.index will look up the path 'app/views/home/index.php'
        return $this->theme->of('hello', $view)->render();
        //return View::make('hello');
    }

    public function showError($code)
    {
        print_r($code);
        die();
        $view = array('name' => 'BZ');
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            )));
        $viewname = 'site.error' . $errorcode;
        // home.index will look up the path 'app/views/home/index.php'
        return $this->theme->of($viewname, $view)->render();
    }

}
