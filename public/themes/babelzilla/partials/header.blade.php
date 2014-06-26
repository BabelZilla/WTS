<div class="fixed">
    <nav class="top-bar" data-topbar>
        <ul class="title-area">
            <li class="name">
                <h1>
                    <a href="<?php echo route('home') ?>">
                        <img src="<?php echo asset('themes/babelzilla/assets/img/globe-60.png'); ?>" width='48'
                             height='48'> BabelZilla
                    </a>
                </h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
        </ul>

        <section class="top-bar-section">

            <ul class="left">
                <li class="divider"></li>
                <li>
                    <a class="active" href="<?= route('projectlist'); ?>">{{ Trans('wts.projects') }}</a>
                </li>
                <li class="divider"></li>
                <li class="has-dropdown">
                    <a href="#">{{ Trans('wts.resources') }}</a>
                    <ul class="dropdown">
                        <li><a href="http://blog.babelzilla.org">{{ Trans('wts.blog') }}</a></li>
                        <li><a href="http://babelwiki.babelzilla.org">{{ Trans('wts.wiki') }}</a></li>
                        <li><a href="#">{{ Trans('wts.tutorials') }}</a></li>
                        <li><a href="#">{{ Trans('wts.glossary') }}</a></li>
                    </ul>
                </li>
                <li class="divider"></li>
                <li class="has-dropdown">
                    <a href="#">{{ Trans('wts.about') }}</a>
                    <ul class="dropdown">
                        <li><a href="/contact">{{ Trans('wts.contact') }}</a></li>
                        <li><a href="/terms">{{ Trans('wts.terms') }}</a></li>
                        <li><a href="/privacy">{{ Trans('wts.privacy') }}</a></li>
                        <li><a href="/about">{{ Trans('wts.about') }}</a></li>
                        <li><a href="/imprint">{{ Trans('wts.imprint') }}</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="right">
                <li class="has-form">
                    <div class="large-8 columns">
                        <input type="text" placeholder="{{ Trans('wts.searchplaceholder') }}">
                    </div>
                    <div class="large-4 columns">
                        <a href="#" class="button expand" style="margin-top: 3px">{{ Trans('wts.search') }}</a>
                    </div>
                </li>
                <?php if (!Auth::check()) { ?>
                    <li style="margin-right: 15px; margin-top: 7px"><a class="button" data-dropdown="loginDrop"
                                                                       data-options="align:left"
                                                                       href="#">{{ Trans('wts.login_signup') }}</a></li>
                    <div class="f-dropdown content medium" data-dropdown-content="" id="loginDrop">
                        <form method="POST"
                              action="{{{ Confide::checkAction('UserController@do_login') ?: URL::to('/user/login') }}}"
                              accept-charset="UTF-8">
                            <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                            <fieldset>
                                <div class="form-group">
                                    <label for="email">Username or Email</label>
                                    <input class="form-control" tabindex="1" placeholder="Username or Email" type="text"
                                           name="email" id="email" value="">
                                </div>
                                <div class="form-group">
                                    <label for="password">
                                        Password
                                        <small>
                                            <a href="<?php echo route('forgotpassword'); ?>">(forgot password)</a>
                                        </small>
                                    </label>
                                    <input class="form-control" tabindex="2" placeholder="Password" type="password"
                                           name="password" id="password">
                                </div>
                                <div class="form-group">
                                    <label for="remember" class="checkbox">Remember me <input type="hidden"
                                                                                              name="remember" value="0">
                                        <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
                                    </label>
                                </div>

                                <div class="form-group">
                                    <button class="button" type="submit" tabindex="3">Login</button>

                                    <p class="text-center"><a href="{{ route('registeruser') }}">{{{
                                            Lang::get('confide.login.create_account') }}}</a></p>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                <?php } else { ?>
                    <li class="divider"></li>
                    <li class="has-dropdown">
                        <a href="#">{{ Trans('wts.hellouser') }}, {{ Auth::user()->username }}</a>
                        <ul class="dropdown">
                            <li><a href="<?= route('dashboard'); ?>"><i class="fa fa-dashboard"></i> {{
                                    Trans('wts.dashboard') }}</a></li>
                            <li><a href="<?= route('profile'); ?>"> {{ Trans('wts.profile') }}</a></li>
                            <li><a href="<?= route('settings'); ?>"><i class="fa fa-cog"></i> {{ Trans('wts.settings')
                                    }}</a></li>
                            <li class="divider"></li>
                            <li><a href="<?= route('logout'); ?>"> {{ Trans('wts.logout') }}</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </section>
    </nav>
</div>
<div class="row">
    <div class="large-12 columns">
        <br/>
<?php echo Theme::breadcrumb()->render(); ?>