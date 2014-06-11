<?php
// no direct access
use Guzzle\Service\Client;
use Illuminate\Database\Capsule\Manager as Capsule;

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED | E_STRICT));
ini_set('display_errors', 1);

class TransvisionController extends \BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->theme->asset()->container('footer')->add('dataTables_js', 'themes/babelzilla/assets/js/jquery.dataTables.min.js');
        $this->theme->asset()->container('footer')->add('dataTablesF_js', 'themes/babelzilla/assets/js/dataTables.foundation.js');
    }

    public function search()
    {
        $client = new Client('http://transvision.mozfr.org/');
        $source_language = Input::Get('sourcelocale', 'en-US');
        $locale = Input::Get('locale', 'fr');
        $repo = Input::Get('repo', 'release');
        $term = Input::Get('recherche', '');
        $search_type = 'entities';
        $perfect_match = Input::Get('perfect_match') ? '&perfect_match=perfect_match' : '';
        $wild = Input::Get('wild') ? '&wild=wild' : '';
        $case_sensitive = Input::Get('case_sensitive') ? '&case_sensitive=case_sensitive' : '';
        $whole_word = Input::Get('whole_word') ? '&whole_word=whole_word' : '';
        $params = $perfect_match . $case_sensitive . $wild . $whole_word;
        $request = $client->get("?sourcelocale=$source_language&locale=$locale&repo=$repo&recherche=$term$params&json");
        $langs = file(app_path() . '/locales/' . $repo . '.txt');

        if ($term != "") {
            // Send the request and get the response
            $response = $request->send();
            $answer = json_decode($response->getBody());
        }
        $availRepos = array('release' => 'Release', 'beta' => 'Beta', 'aurora' => 'Aurora', 'central' => 'Central', 'gaia' => 'Gaia-l10n',
            'gaia_1_1' => 'Gaia 1.1', 'gaia_1_2' => 'Gaia 1.2', 'gaia_1_3' => 'Gaia 1.3',);
        //'mozilla_org' => 'www.mozilla.org');

        $repo_html = WtsHelper::getHtmlSelectOptions($availRepos, $repo, true);
        $sl_html = WtsHelper::getHtmlSelectOptions($langs, $source_language, false);
        $tl_html = WtsHelper::getHtmlSelectOptions($langs, $locale, false);
        $view = array(
            'repo_html' => $repo_html,
            'sl_html' => $sl_html,
            'tl_html' => $tl_html,
            'answer' => $answer,
        );
        $this->theme->setTitle($project->name);
        return $this->theme->of('project.transvision', $view)->render();
    }
}

 