<div class="comments large-12 columns">

    <h3 class="comments--title">
        {{ trans('comments.comments_heading') }}
    </h3>

    @if (!$comments->isEmpty())
    <p class="comments--add--link">
        <a href="#{{ trans('comments.add_form_anchor') }}">
            {{ trans('comments.add_form_link_text') }}
        </a>
    </p>
    @endif

    @include ('fbf.laravel.comments.list')

    {{-- If you are not using this file, add this anchor to your view --}}
    {{-- as this is the point that the controller redirect users back to --}}
    <h4 id="{{ trans('comments.add_form_anchor') }}">
        {{ trans('comments.add_comment_heading') }}
    </h4>

    @if (Session::has('laravel-comments::error'))
    <p class="comments--error">
        {{ Session::get('laravel-comments::error') }}
    </p>
    @endif

    @if (Auth::check())

    @include ('fbf.laravel.comments.form')

    @else

    <p class="comments--login--required">
        {{ trans('comments.login_required') }}
        <a href="{{ action('UserController@login') }}?return={{ urlencode(Request::url()) }}" class="btn">
            {{ trans('comments.login_btn_text') }}
        </a>
        <a href="{{ action('UserController@create') }}?return={{ urlencode(Request::url()) }}" class="btn">
            {{ trans('comments.register_btn_text') }}
        </a>
    </p>

    @endif
</div>