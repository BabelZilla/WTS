<div class="row">
    <aside class="large-3 columns">

        <div class="list-group">
            <a class="list-group-item">
                <h5 class="list-group-item-heading">Database Setup</h5>

                <p class="list-group-item-text">All information we need to create a connection with your database.</p>
            </a>
            <a class="list-group-item active">
                <h5 class="list-group-item-heading">Administration Basics</h5>

                <p class="list-group-item-text">Create the very first account for the WTS</p>
            </a>
            <a class="list-group-item">
                <h5 class="list-group-item-heading">WTS Meta</h5>

                <p class="list-group-item-text">Settings for WTS. You can change this later.</p>
            </a>

            <div class="panel">
                <h5>Step <strong>2</strong> of <strong>3</strong></h5>

                <div class="progress small-12 success radius"><span class="meter" style="width: 33%"></span></div>
            </div>
        </div>
    </aside>
    <div class="large-9 columns" role="content">
        <article class="box">
            <form method="post" role="form">
                <div class="row">
                    <div class="small-12">
                        <h6 style="padding-left: 15px;">Configure Email settings:</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="small-12">
                        <div class="row">
                            <div class="small-5 columns">
                                <label for="right-label" class="right inline">Send from</label>
                            </div>
                            <div class="small-7 columns">
                                <input type="text" name="sendermail" placeholder="Sender email">
                                @if ($errors->has('sendermail'))
                                @foreach ($errors->get('sendermail') as $message)
                                <span class="alert-box alert"> {{ $message }} </span>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="small-12">
                        <div class="row">
                            <div class="small-5 columns">
                                <label for="right-label" class="right inline">Sender name</label>
                            </div>
                            <div class="small-7 columns">
                                <input type="text" name="sendername" placeholder="Sender name">
                                @if ($errors->has('sendername'))
                                @foreach ($errors->get('sendernam') as $message)
                                <span class="alert-box alert"> {{ $message }} </span>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="small-12">
                        <div class="row">
                            <div class="small-5 columns">
                                <label for="right-label" class="right inline">Path to sendmail</label>
                            </div>
                            <div class="small-7 columns">
                                <input type="text" name="sendmailpath" value="/usr/sbin/sendmail -bs">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="small-12">
                        <h6 style="padding-left: 15px;">Details for the first user account:</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="small-12">
                        <div class="row">
                            <div class="small-5 columns">
                                <label for="right-label" class="right inline">Username</label>
                            </div>
                            <div class="small-7 columns">
                                <input type="text" name="username" placeholder="Username">
                                @if ($errors->has('username'))
                                @foreach ($errors->get('username') as $message)
                                <span class="alert-box alert"> {{ $message }} </span>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="small-12">
                        <div class="row">
                            <div class="small-5 columns">
                                <label for="right-label" class="right inline">Email</label>
                            </div>
                            <div class="small-7 columns">
                                <input type="email" name="email" placeholder="Email">
                                @if ($errors->has('email'))
                                @foreach ($errors->get('email') as $message)
                                <span class="alert-box alert"> {{ $message }} </span>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="small-12">
                        <div class="row">
                            <div class="small-5 columns">
                                <label for="right-label" class="right inline">Password</label>
                            </div>
                            <div class="small-7 columns">
                                <input type="password" name="password" placeholder="Password">
                                @if ($errors->has('password'))
                                @foreach ($errors->get('password') as $message)
                                <span class="alert-box alert"> {{ $message }} </span>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="small-12">
                        <div class="row">
                            <div class="small-5 columns">
                                <label for="right-label" class="right inline">Confirm password</label>
                            </div>
                            <div class="small-7 columns">
                                <input type="password" name="password_confirmation"" placeholder="Confim password">
                            </div>
                        </div>
                    </div>
                </div>

        </article>
        <div class="small-12">
            <p class="clearfix panel" style="margin-top: 1.0rem;">
                <a href="javascript:history.go(-1)" class="button small radius alert left">← Previous Step</a>
                <input type="submit" class="button small radius right" name="save" value="Next Step →"/>
            </p>
        </div>
        </form>
    </div>
</div>