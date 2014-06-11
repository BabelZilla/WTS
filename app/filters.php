<?php

Route::filter("auth", function () {
    if (Auth::guest()) {
        return Redirect::route("login");
    }
});

Route::filter('maintainer', function () {
        if (!Project::find(Input::get('id'))->isMaintainer(Auth::user()->id)) {
            return Response::error('401');
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