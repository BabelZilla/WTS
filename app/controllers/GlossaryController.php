<?php

class GlossaryController extends BaseController
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

    public function index()
    {
        $this->theme->breadcrumb()->add(array(
            array(
                'label' => 'Home',
                'url' => '/'
            ),
            array(
                'label' => 'Glossary',
            )
        ));
        $glossaries = Glossaries::get()->all();
        $view = array('glossaries' => $glossaries);
        return $this->theme->of('glossary.index', $view)->render();
    }

    public function showTerms($id, $letter = 'all', $page = 1)
    {
        $this->theme->asset()->container('footer')->add('glossary_js', 'themes/babelzilla/assets/js/glossary.js');
        $website = route('terms', array(
            'id' => $id,
            'letter' => $letter,
            //'page' => $page,
        ));
        $rowsperpage = 20;
        //$glossary = Glossaries::find($id);
        $termCnt = GlossaryTerms::CountTermsByLetter($id, $letter);
        $pagination = new CSSPagination($termCnt, $rowsperpage, $website); // create instance object
        $pagination->setPage($page);
        $terms = GlossaryTerms::GetTermsByLetter($id, $letter, $rowsperpage, $pagination->getLimit());
        //print_r($terms);
        $LetterNav = $this->GlossaryABC($id, $letter, $page);
        $view = array('terms' => $terms,
            'letternav' => $LetterNav,
            'pagination' => $pagination,
        );
        return $this->theme->of('glossary.terms', $view)->render();
    }

    private function GlossaryABC($id, $letter, $page = 1)
    {
        $myabc = $this->abcplus();
        //$nav = '<div align=center>';
        $nav = '<dl class="sub-nav text-center">';
        /*
         <dl class="sub-nav"> <dt>Filter:</dt> <dd class="active"><a href="#">All</a></dd> <dd><a href="#">Active</a></dd> <dd><a href="#">Pending</a></dd> <dd><a href="#">Suspended</a></dd> </dl>
         */
        foreach ($this->abcplus() as $i => $ltrval) {
            $key = $myabc[$i];
            if ($letter == $key) $nav .= "<dd class='abc active'><a href='#'>$ltrval</a></dd>";
            else {
                $url = route('terms', array(
                    'id' => $id,
                    'letter' => $ltrval,
                    'page' => 1,
                ));
                $nav .= "<dd class='abc'><a href='$url'>$ltrval</a></dd>";
            }
            //$nav .= ' | ';
        }
        return substr($nav, 0, strlen($nav) - 3) . "\n</dl>\n\n"; // end of HTML
    }

    private function abc()
    {
        return array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    }

    private function abcplus()
    {
        return array_merge(array('All'), $this->abc(), array('Other'));
    }

    private function abcplus_key()
    {
        return array_merge(array('All'), $this->abc(), array('Other'));
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
        // home.index will look up the path 'app/views/home/index.php'
        return $this->theme->of('hello', $view)->render();
        //return View::make('hello');
    }
}
