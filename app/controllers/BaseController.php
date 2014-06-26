<?php

class BaseController extends Controller
{

    public $theme;
    public $user;
    public $usersettings;

    function __construct()
    {
        if (Auth::Check()) {
            $this->user = Auth::User();
            $this->usersettings = unserialize($this->user->settings);
        } else {
            $this->usersettings = Config::Get('user.usersettings');
        }
        if (Auth::guest()) {
            $lang = WtsHelper::getLanguage(Config::Get('wts.appLanguages'));
            if ($lang) $this->usersettings['locale'] = $lang;
        }

        App::setLocale($this->usersettings['locale']);

        $this->theme = Theme::uses('babelzilla')->layout('default');
        $this->theme->asset()->container('footer')->add('modernizr_js', 'themes/babelzilla/assets/js/vendor/modernizr.js');
        $this->theme->asset()->container('footer')->add('jquery_js', 'themes/babelzilla/assets/js/vendor/jquery.js');
        $this->theme->asset()->container('footer')->add('fastclick_js', 'themes/babelzilla/assets/js/vendor/fastclick.js');
        $this->theme->asset()->container('footer')->add('foundation_js', 'themes/babelzilla/assets/js/foundation.min.js');
        $this->theme->asset()->container('footer')->add('init_js', 'themes/babelzilla/assets/js/init.js');
        $this->theme->breadcrumb()->setTemplate('
            <ul class="breadcrumbs">
            @foreach ($crumbs as $i => $crumb)
                @if ($i != (count($crumbs) - 1))
                <li class=""><a href="{{ $crumb["url"] }}">{{ $crumb["label"] }}</a></li>
                @else
                <li class="active">{{ $crumb["label"] }}</li>
                @endif
            @endforeach
            </ul>
        ');
        /*App::error(function($exception, $code)
        {
            switch ($code)
            {
                case 403:
                    return Response::view('errors.403', array(), 403);

                case 404:
                    $view = array(
                        'error' => $exception,
                        'code' => $code
                    );
                    return $this->theme->of('errors.404', $view)->render();
                    //return Response::view('errors.404', array(), 404);

                case 500:
                    return Response::view('errors.500', array(), 500);

                default:
                    return Response::view('errors.default', array(), $code);
            }
        });*/
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    public function getProject($id)
    {
        if (is_numeric($id)) {
            $project = Project::find($id);
        } else {
            $project = Project::where('slug', '=', $id)->first();
        }
        if (!$project) App::abort(404, 'The requested project does not exist.');
        return $project;
    }
}