<?php

class PageController extends BaseController
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

    public function about()
    {
        $view = array();
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            ),
            array(
                'label' => 'About',
                'url' => route('about'),
            )
        ));
        return $this->theme->of('pages.about', $view)->render();
    }

    public function terms()
    {
        $view = array();
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            ),
            array(
                'label' => 'Terms of use',
                'url' => route('terms'),
            )
        ));
        return $this->theme->of('pages.terms', $view)->render();
    }

    public function imprint()
    {
        $view = array();
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            ),
            array(
                'label' => 'Imprint',
                'url' => route('imprint'),
            )
        ));
        return $this->theme->of('pages.imprint', $view)->render();
    }

    public function privacy()
    {
        $view = array();
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            ),
            array(
                'label' => 'Privacy Policy',
                'url' => route('privacy'),
            )
        ));
        return $this->theme->of('pages.privacy', $view)->render();
    }

    public function kitchensink()
    {
        $view = array();
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            ),
            array(
                'label' => 'Kitchen Sink',
                'url' => route('sink'),
            )
        ));
        return $this->theme->of('pages.kitchen-sink', $view)->render();
    }
}
