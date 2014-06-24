<form method="POST"
      action="{{{ (Confide::checkAction('UserController@do_reset_password'))    ?: URL::to('/user/reset') }}}"
      accept-charset="UTF-8">
    <input type="hidden" name="token" value="{{{ $token }}}">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

    <div class="form-group">
        <label for="password">{{{ Lang::get('confide.password') }}}</label>
        <input class="form-control" placeholder="{{{ Lang::get('confide.password') }}}" type="password"
               name="password" id="password">
    </div>
    <div class="form-group">
        <label for="password_confirmation">{{{ Lang::get('confide.password_confirmation') }}}</label>
        <input class="form-control" placeholder="{{{ Lang::get('confide.password_confirmation') }}}"
               type="password" name="password_confirmation" id="password_confirmation">
    </div>

    @if ( Session::get('error') )
    <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
    @endif

    @if ( Session::get('notice') )
    <div class="alert">{{{ Session::get('notice') }}}</div>
    @endif

    <div class="form-actions form-group">
        <button type="submit" class="btn btn-primary">{{{ Lang::get('confide.forgot.submit') }}}</button>
    </div>
</form>

<!-- Start:  Login Form-->
<section class="row" id="signup">
    <div class="small-12 large-4 small-centered large-centered column">
        <h3 class="text-center title">Reset password</h3>

        <form action="/signin" method="post" class="form-stacked">
            <fieldset>

                <div class="clearfix">
                    <p>Enter your email address below and we'll send a special reset password link to your inbox.</p>

                    <div class="input">
                        <input name="username" type="email" placeholder="Email" required=""/>
                    </div>
                </div>

                <div class="clearfix form-link">
                    <p class="reset"><a href="login.html" title="Login"> Already have an account? <strong>Sign
                                In</strong></a></p>

                    <p class="reset"><a href="registration.html"> New member registration</a></p>
                </div>
                <div class="actions">
                    <input class="  button" type="submit" value="Reset password">

                </div>
            </fieldset>
        </form>
    </div>
</section>