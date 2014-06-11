<div class="row">
    <div class="large-offset-3 large-6 columns">
        <div class="signup-panel">
            <p class="welcome"> Welcome to BabelZilla!</p>

            <form method="POST" action="{{{ (Confide::checkAction('UserController@store')) ?: URL::to('user')  }}}"
                  accept-charset="UTF-8">
                <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

                <div class="row collapse">
                    <div class="small-2  columns">
                        <span class="prefix"><i class="fa fa-user"></i></span>
                    </div>
                    <div class="small-10  columns">
                        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}"
                               type="text" name="username" id="username" value="{{{ Input::old('username') }}}">
                    </div>
                </div>
                <div class="row collapse">
                    <div class="small-2 columns">
                        <span class="prefix"><i class="fa fa-envelope"></i></span>
                    </div>
                    <div class="small-10  columns">
                        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}"
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
                    <div class="small-2 columns ">
                        <span class="prefix"><i class="fa fa-lock "></i></span>
                    </div>
                    <div class="small-10 columns ">
                        <input class="form-control"
                               placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password"
                               name="password_confirmation" id="password_confirmation">
                    </div>
                </div>
                <div class="row">
                    <div class="small-12 columns">
                        <button tabindex="3" type="submit" class="button">{{{
                            Lang::get('confide::confide.signup.submit') }}}
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
            <ul>
                @foreach ($providers as $provider)
                <li>
                    {{ link_to_route('anvard.routes.login', $provider, $provider) }}
                </li>
                @endforeach
            </ul>
            <p>Already have an account? <a href="{{ Route('login') }}">Login here &raquo</a></p>
        </div>
    </div>
</div>

 