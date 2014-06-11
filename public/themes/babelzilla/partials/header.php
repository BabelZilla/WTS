<div class="fixed">
    <nav class="top-bar" data-topbar>
        <ul class="title-area">
            <li class="name">
                <h1>
                    <a href="<?php echo route('home') ?>">
                        <img src="<?php echo asset('themes/babelzilla/assets/img/globe100px.png'); ?>"> BabelZilla
                    </a>
                </h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
        </ul>

        <section class="top-bar-section">

            <ul class="left">
                <li class="divider"></li>
                <li>
                    <a class="active" href="<?= route('projectlist'); ?>">Projects</a>
                </li>
                <li class="divider"></li>
                <li class="has-dropdown">
                    <a href="#">Ressources</a>
                    <ul class="dropdown">
                        <li><a href="http://blog.babelzilla.org">Blog</a></li>
                        <li><a href="http://babelwiki.babelzilla.org">Wiki</a></li>
                        <li><a href="#">Tutorials</a></li>
                        <li><a href="#">Glossary</a></li>
                    </ul>
                </li>
                <li class="divider"></li>
                <li class="has-dropdown">
                    <a href="#">About</a>
                    <ul class="dropdown">
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="/terms">Terms of use</a></li>
                        <li><a href="/privacy">Privacy Policy</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/imprint">Imprint</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="right">
                <?php if (!Auth::check()) { ?>
                    <li style="margin-right: 5px;"><a class="button" data-dropdown="loginDrop" data-options="align:left"
                                                      href="#">Login / Signup</a></li>
                    <div class="f-dropdown content medium" data-dropdown-content="" id="loginDrop">

                        <form method="POST" action="<?php echo route('login'); ?>" accept-charset="UTF-8">
                            <input type="hidden" name="_token" value="Sf1d8Vler1fqFpzYHTIBovRLTV4PDS6XmMtUreP5">
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
                                    <button tabindex="3" type="submit" class="btn btn-default">Login</button>
                                </div>
                            </fieldset>
                        </form>

                    </div>
                <?php } else { ?>
                    <li class="divider"></li>
                    <li class="has-dropdown">
                        <a href="#">Hello, <?php echo Auth::user()->username; ?></a>
                        <ul class="dropdown">
                            <li><a href="<?= route('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                            <li><a href="<?= route('profile'); ?>"> Profile</a></li>
                            <li><a href="<?= route('settings'); ?>"><i class="fa fa-cog"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="<?= route('logout'); ?>"> Logout</a></li>
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