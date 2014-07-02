<div class="row">
    <aside class="large-3 columns">

        <div class="list-group">
            <a class="list-group-item">
                <h5 class="list-group-item-heading">Database Setup</h5>

                <p class="list-group-item-text">All information we need to create a connection with your database.</p>
            </a>
            <a class="list-group-item">
                <h5 class="list-group-item-heading">Administration Basics</h5>

                <p class="list-group-item-text">Create the very first account for the WTS</p>
            </a>
            <a class="list-group-item active">
                <h5 class="list-group-item-heading">WTS Config & Meta</h5>

                <p class="list-group-item-text">Settings for WTS. You can change this later.</p>
            </a>

            <div class="panel">
                <h5>Step <strong>3</strong> of <strong>3</strong></h5>

                <div class="progress small-12 success radius"><span class="meter" style="width: 66%"></span></div>
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
                                <label for="right-label" class="right inline">Title of your Website</label>
                            </div>
                            <div class="small-7 columns">
                                <input type="text" name="title">
                                @if ($errors->has('title'))
                                @foreach ($errors->get('title') as $message)
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
                                <label for="right-label" class="right inline">Description</label>
                            </div>
                            <div class="small-7 columns">
                                <input type="text" name="description" placeholder="Descriptiom">
                                @if ($errors->has('description'))
                                @foreach ($errors->get('description') as $message)
                                <span class="alert-box alert"> {{ $message }} </span>
                                @endforeach
                                @endif
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
