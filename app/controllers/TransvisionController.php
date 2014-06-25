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
        $source_language = Input::Get('sourcelocale', 'en-US');
        $locale = Input::Get('locale', $this->usersettings['locale']);
        $repo = Input::Get('repo', 'release');
        $term = Input::Get('recherche', '');
        $searchtype = Input::Get('searchtype', 'entities');
        $perfect_match = Input::Get('perfect_match') ? 1 : 0;
        $case_sensitive = Input::Get('case_sensitive') ? 1 : 0;
        $whole_word = Input::Get('whole_word') ? 1 : 0;
        $params = $perfect_match . $case_sensitive . $wild . $whole_word;
        $client = new Client();
        $request = $client->get("http://transvision-beta.mozfr.org/api/v1/repositories/");
        $response = $request->send();
        $repos = json_decode($response->getBody());
        foreach ($repos as $avrepo) {
            $availRepos[] = WtsHelper::makeOption(ucfirst($avrepo), $avrepo);
        }
        $repo_html = WtsHelper::selectList($availRepos, 'repo', '', 'text', 'value', $repo);
        $request = $client->get("http://transvision-beta.mozfr.org/api/v1/locales/$repo");
        $response = $request->send();
        $langs = json_decode($response->getBody());
        foreach ($langs as $lang) {
            $availLangs[] = WtsHelper::makeOption($lang, $lang);
        }
        $searchtypes[] = WtsHelper::makeOption('Entities', 'entities');
        $searchtypes[] = WtsHelper::makeOption('Strings', 'strings');
        $searchtypes[] = WtsHelper::makeOption('Both', 'all');
        $st_html = WtsHelper::selectList($searchtypes, 'searchtype', '', 'text', 'value', $searchtype);
        $sl_html = WtsHelper::selectList($availLangs, 'sourcelocale', '', 'text', 'value', $source_language);
        $tl_html = WtsHelper::selectList($availLangs, 'locale', '', 'text', 'value', $locale);
        $request = $client->get("http://transvision-beta.mozfr.org/api/v1/search/$searchtype/$repo/$source_language/$locale/$term/?case_sensitive=$case_sensitive&perfect_match=$perfect_match&whole_world=$whole_word");
        if ($term != "") {
            // Send the request and get the response
            $response = $request->send();
            $answer = json_decode($response->getBody());
        }
        //print_r($answer);
        $view = array(
            'repo_html' => $repo_html,
            'sl_html' => $sl_html,
            'tl_html' => $tl_html,
            'st_html' => $st_html,
            'answer' => $answer,
            'term' => $term,
            'source_language' => $source_language,
            'locale' => $locale,
        );
        $this->theme->asset()->container('footer')->add('transvision_js', 'themes/babelzilla/assets/js/transvision.js');
        $this->theme->setTitle($project->name);
        return $this->theme->of('project.transvision', $view)->render();
    }
}

 