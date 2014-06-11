<div class="comments">

    <h3 class="comments--title">
        <?php echo trans('laravel-comments::messages.comments_heading') ?>
    </h3>

    <?php if (!$comments->isEmpty()) { ?>
        <p class="comments--add--link">
            <a href="#<?php echo trans('laravel-comments::messages.add_form_anchor') ?>">
                <?php trans('laravel-comments::messages.add_form_link_text') ?>
            </a>
        </p>
    <?php } ?>

    @include ('laravel-comments::list')

    <h4 id="<?php echo trans('laravel-comments::messages.add_form_anchor') ?>">
        <?php trans('laravel-comments::messages.add_comment_heading') ?>
    </h4>

    <?php if (Session::has('laravel-comments::error')) { ?>
        <p class="comments--error">
            <?php echo Session::get('laravel-comments::error') ?>
        </p>
    <?php } ?>

    <?php if (Auth::check()) { ?>

        @include ('laravel-comments::form')

    <?php } else { ?>

        <p class="comments--login--required">
            <?php echo trans('laravel-comments::messages.login_required') ?>
            <a href="<?php echo action('UserController@showLogin') ?>?return=<?php echo urlencode(Request::url()) ?>"
               class="btn">
                <?php echo trans('laravel-comments::messages.login_btn_text') ?>
            </a>
            <a href="<?php echo action('UserController@showRegister') ?>?return=<?php echo urlencode(Request::url()) ?>"
               class="btn">
                <?php echo trans('laravel-comments::messages.register_btn_text') ?>
            </a>
        </p>

    <?php } ?>
</div>