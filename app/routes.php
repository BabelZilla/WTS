<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	//return View::make('hello');
});*/
Route::get('test', 'TestController@test');
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));
Route::get('projects/', array('as' => 'projectlist', 'uses' => 'ProjectController@index'));
Route::get('projects/delete', 'ProjectController@deleteAll');
Route::get('project/upload', array('as' => 'projectupload', 'uses' => 'ProjectController@upload'));
Route::post('project/upload', array('as' => 'importrepo', 'uses' => 'ProjectController@importrepo'));
Route::get('project/{id}/edit', array('before' => 'auth|maintainer', 'as' => 'editupload', 'uses' => 'ProjectController@editUpload'));
Route::post('project/{id}/edit', array('before' => 'auth|maintainer', 'as' => 'edituploadpost', 'uses' => 'ProjectController@editUploadpost'));
Route::get('project/{id}/language/{lang}/translate/{file}/show/{show}/page/{page}', array('as' => 'translatefile', 'uses' => 'ProjectController@translate'));
Route::get('project/{id}/language/{lang}/filelist', array('as' => 'projectfilelist', 'uses' => 'ProjectController@filelist'));
Route::get('project/{id}', array('as' => 'project', 'uses' => 'ProjectController@show'));
Route::get('project/{id}/download', array('as' => 'projectdownload', 'uses' => 'ProjectController@download'));
Route::get('project/parse/{id}', array('as' => 'projectparse', 'uses' => 'ProjectController@parse'));
Route::get('project/{id}/repo', 'RepoController@summary');
Route::get('project/{id}/repo/summary', array('as' => 'reposummary', 'uses' => 'RepoController@summary'));
Route::get('project/{id}/repo/tree', array('as' => 'repotree', 'uses' => 'RepoController@tree'));
Route::get('project/{id}/repo/tags', array('as' => 'repotags', 'uses' => 'RepoController@tags'));
Route::get('project/{id}/repo/shortlog', array('as' => 'reposhortlog', 'uses' => 'RepoController@shortlog'));
Route::get('project/{id}/repo/search', array('as' => 'reposearch', 'uses' => 'RepoController@search'));
Route::get('project/{id}/repo/commit', array('as' => 'repocommit', 'uses' => 'RepoController@commit'));
Route::get('project/{id}/repo/commitdiff', array('as' => 'repocommitdiff', 'uses' => 'RepoController@commitdiff'));
Route::get('project/{id}/repo/archive', array('as' => 'repoarchive', 'uses' => 'RepoController@archive'));
Route::get('project/{id}/repo/patch', array('as' => 'repopatch', 'uses' => 'RepoController@patch'));
Route::get('project/{id}/repo/viewblob', array('as' => 'repoviewblob', 'uses' => 'RepoController@viewblob'));
Route::get('project/{id}/repo/blob', array('as' => 'repoblob', 'uses' => 'RepoController@blob'));
Route::get('project/{id}/repo/rss', array('as' => 'reporss-log', 'uses' => 'RepoController@rsslog'));
Route::get('project/{id}/repo/issues', array('as' => 'repoissues', 'uses' => 'RepoController@gissues'));
Route::get('project/{id}/repo/issues/comments/{cid}', array('as' => 'repocomments', 'uses' => 'RepoController@gcomments'));
/* Confide routes */
Route::get('user/create', array('as' => 'registeruser', 'uses' => 'UserController@create'));
Route::post('user', 'UserController@store');
Route::get('user/login', array('as' => 'login', 'uses' => 'UserController@login'));
Route::post('user/login', 'UserController@do_login');
Route::get('user/confirm/{code}', 'UserController@confirm');
Route::get('user/forgot_password', array('as' => 'forgotpassword', 'uses' => 'UserController@forgot_password'));
Route::post('user/forgot_password', 'UserController@do_forgot_password');
Route::get('user/reset_password/{token}', 'UserController@reset_password');
Route::post('user/reset_password', 'UserController@do_reset_password');
Route::get('user/logout', array('as' => 'logout', 'uses' => 'UserController@logout'));
Route::get('user/profile/{id?}', array('before' => 'auth', 'as' => 'profile', 'uses' => 'UserController@profile'));
Route::get('user/settings', array('as' => 'settings', 'uses' => 'UserController@settings'));

/* Dashboard routes */
Route::get('user/dashboard/edit/project/{id}', array('as' => 'editproject', 'uses' => 'DashboardController@editproject'));
Route::get('user/dashboard', array('as' => 'dashboard', 'uses' => 'DashboardController@index'));
/* Ajax */
Route::post('project/ajax/upload', array('as' => 'ajaxupload', 'uses' => 'AjaxController@upload'));
Route::post('project/ajax/extract', array('as' => 'ajaxextract', 'uses' => 'AjaxController@extract'));
Route::post('project/ajax/postupload', array('as' => 'ajaxdpostpload', 'uses' => 'AjaxController@doupload'));
Route::post('project/ajax/preview', array('as' => 'ajaxpreview', 'uses' => 'AjaxController@preview'));
Route::post('project/ajax/suggestions', array('as' => 'ajaxsuggestions', 'uses' => 'AjaxController@suggestions'));
Route::post('project/ajax/save', array('as' => 'ajaxsave', 'uses' => 'AjaxController@save'));
Route::get('project/ajax/parse', array('as' => 'ajaxparse', 'uses' => 'AjaxController@parse'));
Route::post('project/ajax/versions', array('as' => 'ajaxversions', 'uses' => 'AjaxController@versions'));
Route::get('ajax/getlocales/{language}', 'AjaxController@getlocales');
Route::post('user/settings/save', 'AjaxController@saveusersettings');
Route::post('transvision/ajax/getrepolocales', 'AjaxController@getrepolocales');
/* Static pages */
Route::get('about', array('as' => 'about', 'uses' => 'PageController@about'));
Route::get('terms', array('as' => 'terms', 'uses' => 'PageController@terms'));
Route::get('privacy', array('as' => 'privacy', 'uses' => 'PageController@privacy'));
Route::get('contact', array('as' => 'contact', 'uses' => 'PageController@contact'));
Route::get('imprint', array('as' => 'imprint', 'uses' => 'PageController@imprint'));
/* Glossary */
Route::get('glossary', array('as' => 'glossary', 'uses' => 'GlossaryController@index'));
Route::get('glossary/{id}/{letter?}/{page?}', array('as' => 'terms', 'uses' => 'GlossaryController@showTerms'));
/* */
Route::get('projects/repos', array('as' => 'repos', 'uses' => 'RepoController@index'));
// remove this from the live site
Route::get('kitchen-sink', array('as' => 'sink', 'uses' => 'PageController@kitchensink'));
// Transvision search
Route::any('transvision', array('as' => 'transvision', 'uses' => 'TransvisionController@search'));
Route::group(array('before' => 'auth'), function () {
    Route::controller('translations', 'Barryvdh\TranslationManager\Controller');
});
Route::any('install', 'InstallController@run');
// 404 Page
/*App::missing(function ($exception) {
    return Response::view('site.error.404', array(), 404);
});*/
