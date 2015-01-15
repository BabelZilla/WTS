<div class="row">
    <div class="large-12 columns">
        <h3><a href="#">Welcome to the WTS Installer!</a></h3>
        <hr/>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <div class="box">
        @if ($noerror)
            <p class="text-center"><strong>What would you like to do?</strong></p>
            <div class="btn-group text-center">
                <a class="button tiny radius" href="?step=install_db">Install from Scratch</a>
                <span class="junction"><small>or</small></span>
                <a class="button tiny radius disabled" href="">Upgrade</a>
            </div>
        @else
            @if(!$configWritable)
            <span style="color: red;">{{ 'Config directory is not writable' }}</span>
            @endif
            @if(!$tempWritable)
            <span style="color: red;">{{ 'Temp directory is not writable' }}</span>
            @endif
            @if(!$repoWritable)
            <span style="color: red;">{{ 'Repo directory is not writable' }}</span>
            @endif
            @if(!$uploadWritable)
            <span style="color: red;">{{ 'Upload directory is not writable' }}</span>
            @endif
            <span class="text-center">
                <h5>Please fix the problems above and reload this page.</h5>
            </span>
        @endif
        </div>
    </div>
</div>
