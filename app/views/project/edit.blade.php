<script>
    var language = '{{ App::Getlocale() }}'
</script>
<form action="{{ route('edituploadpost', array('id' => $project->slug)) }}" method="post">
    <div class="row">
        <div class="large-12 columns">
            <h3>{{ Trans('wts.addinfo') }}</h3>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns text-center">
            <div class="alert-box radius">
                @choice('wts.apps_found', $found, [], $currentlocale)
            </div>
        </div>
    </div>
    <br/>

    <div class="row">
        <div class="large-12 columns">
            <div class="large-2 columns">
                {{ Trans('wts.selectlicense') }}
            </div>
            <div class="large-4 columns">
                {{ $appselecthtml }}
            </div>
            <div class="large-4 columns">
                {{ Trans('wts.alsotranslatorfor') }}
            </div>
            <div class="large-2 columns">
                {{ $langhtml }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <div class="large-2 columns">
                {{ Trans('wts.releasedate') }}
            </div>
            <div class="large-4 columns">
                <input id="datetimepicker" name="date" type="text">
            </div>
            <div class="large-2 columns">
                {{ Trans('wts.selectlicense') }}
            </div>
            <div class="large-4 columns">
                {{ $licenseselect }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns text-center">
            <button type="submit" class="small button radius">{{ trans('wts.submit') }}</button>
        </div>
    </div>
</form>
