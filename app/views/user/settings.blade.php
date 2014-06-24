<div class="row">
    <div class="large-12 columns">
        <h3>Sorry, not complete... (yet)</h3>
    </div>
</div>
<div class="row">
    <div class="blog_post">
        <form id="settingsform" action="" method="post">
            <div class="large-3 columns">
                {{ Trans('user.preferredlicense') }}
            </div>
            <div class="large-3 columns">
                {{ $licenseselect }}
            </div>
            <div class="large-3 columns">
                {{ Trans('user.applanguage') }}
            </div>
            <div class="large-3 columns">
                {{ $langselect }}
            </div>
            <div class="large-3 columns">
                {{ Trans('user.selecttimezone') }}
            </div>
            <div class="large-3 columns">
                {{ $timezoneselect }}
            </div>
            <div class="large-3 columns">
                {{ Trans('user.selectdateformat') }}
            </div>
            <div class="large-3 columns">
                {{ $dateselect }}
            </div>
            <div class="large-12 columns">
                <button id="post" type="submit" class="small button success radius">{{ Trans('user.save') }}</button>
            </div>
        </form>
    </div>
</div>