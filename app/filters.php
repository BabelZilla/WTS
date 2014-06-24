<?php

Route::filter("auth", function () {
    if (Auth::guest()) {
        return Redirect::route("login");
    }
});

Route::filter('maintainer', function ($route) {

        $id = $route->getParameter('id');
        if (is_numeric($id)) {
            $project = Project::find($id);
        } else {
            $project = Project::where('slug', '=', $id)->first();
        }
        if (!$project->isMaintainer(Auth::user()->id)) {
            App::abort(401, 'Unauthorized action.');
        }
    }
);
/* Check Ajax request */
Route::filter('ajax', function () {
    if (Request::ajax() === false)
        return Response::error('500');
});

Route::filter('permission', function ($permission) {
    if (!Auth::user()->permission($permission)) return Response::error('500');
});