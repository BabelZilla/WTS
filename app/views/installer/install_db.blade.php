<div class="row">
    <div class="large-12 columns">
        <h3><a href="#">Database Setup</a></h3>
        <hr/>
    </div>
</div>
<div class="row">
    <aside class="large-3 columns">

        <div class="list-group">
            <a class="list-group-item active">
                <h5 class="list-group-item-heading">Database Setup</h5>

                <p class="list-group-item-text">All information we need to create a connection with your database.</p>
            </a>
            <a class="list-group-item">
                <h5 class="list-group-item-heading">Administration Basics</h5>

                <p class="list-group-item-text">Create the very first account for the WTS</p>
            </a>
            <a class="list-group-item">
                <h5 class="list-group-item-heading">WTS Meta</h5>

                <p class="list-group-item-text">Settings for WTS. You can change this later.</p>
            </a>

            <div class="panel">
                <h5>Step <strong>1</strong> of <strong>3</strong></h5>

                <div class="progress small-12 success radius"><span class="meter" style="width: 0%"></span></div>
            </div>
        </div>
    </aside>
    <div class="large-9 columns" role="content">
        <article class="box">
            <form method="post" role="form">
                <div class="row">
                    <div class="small-12">
                        <div class="row">
                            <div class="small-5 columns">
                                <label for="right-label" class="right inline">Type</label>
                            </div>
                            <div class="small-7 columns">
                                <select class="form-control" name="db_type">
                                    <option value="mysql">MySQL Standard</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="small-12">
                        <div class="row">
                            <div class="small-5 columns">
                                <label for="right-label" class="right inline">Server Hostname</label>
                            </div>
                            <div class="small-7 columns">
                                <input type="text" name="db_host" value="localhost">
                                @if ($errors->has('host'))
                                @foreach ($errors->get('host') as $message)
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
                                <label for="right-label" class="right inline">Database name</label>
                            </div>
                            <div class="small-7 columns">
                                <input type="text" name="db_name" placeholder="wts">
                                @if ($errors->has('db_name'))
                                @foreach ($errors->get('db_name') as $message)
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
                                <label for="right-label" class="right inline">Username</label>
                            </div>
                            <div class="small-7 columns">
                                <input type="text" name="db_user" placeholder="Username">
                                @if ($errors->has('db_user'))
                                @foreach ($errors->get('db_user') as $message)
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
                                <input type="password" name="db_pass" placeholder="Password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="small-12">
                        <div class="row">
                            <div class="small-5 columns">
                                <label for="right-label" class="right inline">Prefix</label>
                            </div>
                            <div class="small-7 columns">
                                <input type="text" name="db_prefix" placeholder="Prefix">
                            </div>
                        </div>
                    </div>
                </div>
                @if ($errors->has('connect_error'))
                <div class="row">
                    <div class="small-12">
                    @foreach ($errors->get('connect_error') as $message)
                        <span class="alert-box alert"> {{ $message }} </span>
                    @endforeach
                    </div>
                </div>
                @endif
                @if ($errors->has('migrate_error'))
                <div class="row">
                    <div class="small-12">
                        @foreach ($errors->get('migrate_error') as $message)
                        <span class="alert-box alert"> {{ $message }} </span>
                        @endforeach
                    </div>
                </div>
                @endif

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