<div class="row">
    <div class="large-offset-3 large-6 columns">
        <div class="signup-panel">
            <p class="welcome"> Login </p>

            <form method="POST"
                  action="{{{ Confide::checkAction('UserController@do_login') ?: URL::to('/user/login') }}}"
                  accept-charset="UTF-8">
                <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

                <div class="row collapse">
                    <div class="small-2 columns">
                        <span class="prefix"><i class="fa fa-envelope"></i></span>
                    </div>
                    <div class="small-10  columns">
                        <input class="form-control" placeholder="{{{ Lang::get('confide.username_e_mail') }}}"
                               type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                    </div>
                </div>
                <div class="row collapse">
                    <div class="small-2 columns ">
                        <span class="prefix"><i class="fa fa-lock "></i></span>
                    </div>
                    <div class="small-10 columns ">
                        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}"
                               type="password" name="password" id="password">
                    </div>
                </div>
                <div class="row collapse">
                    <div class="small-12 columns ">
                        <label for="remember" class="checkbox">{{{ Lang::get('confide.login.remember') }}}</label>
                        <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
                    </div>
                </div>
                <div class="row">
                    <div class="small-12 columns">
                        <button tabindex="3" type="submit" class="button">{{{ Lang::get('confide.login.submit')
                            }}}
                        </button>
                    </div>
                </div>
                @if ( Session::get('error') )
                <div class="alert alert-error alert-danger">
                    @if ( is_array(Session::get('error')) )
                    {{ head(Session::get('error')) }}
                    @endif
                </div>
                @endif

                @if ( Session::get('notice') )
                <div class="alert">{{ Session::get('notice') }}</div>
                @endif
            </form>
            <div class="row">
                <div class="small-6 columns">
                    <p class="text-center"><a
                            href="{{{ (Confide::checkAction('UserController@forgot_password')) ?: 'forgot' }}}">{{{
                            Lang::get('confide.login.forgot_password') }}}</a></p>
                </div>
                <div class="small-6 columns">
                    <p class="text-center"><a href="{{ route('registeruser') }}">{{{
                            Lang::get('confide.login.create_account') }}}</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

