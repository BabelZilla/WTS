<div class="row">
    <div class="large-12 columns">
        <h2>Submit your Web App</h2>
    </div>
</div>
<div class="row">
    <div class="large-12 columns" id="formdiv_1">
        <div class="panel callout radius" id="warnmessage">
            <h3 style="margin-bottom: 0px; padding:10px;">Attention! Please read this carefully!</h3><br/>
            <h6 class="subheader"><b>By submitting software, you agree to give BabelZilla the right to distribute
                    this file via the BabelZilla website under the license selected.<sup>*</sup>
                    <br/>All work submitted must be your original work, be released under a license which allows
                    permanent distribution, or have received written permission from the owner of the content to do
                    so.
                    <br/>You may not knowingly infringe on any copyright or license agreement within these files.
                    <br/>You will retain any copyrights you own on submitted software.
                    <br/>
                    <small><sup>*</sup>The WTS will ask you for the license later in this process.</small>
            </h6>
        </div>
    </div>
</div>
<div id="busy4" class="square"></div>

<div class="row" id="formdiv_2">
    <div class="large-6 columns">
        Please select your existing project to update it.
    </div>
    <div class="large-3 columns">
        <select class="" id="projects" size="1" name="projects">
            <?php echo implode("\n", $options); ?>
        </select>
    </div>
</div>
<?php if ($errors->has('invalid')) { ?>
    <div class="row">
        <div class="large-12 columns">
            <div class="alert-box alert">
                <?php echo $errors->first('invalid'); ?>
            </div>
        </div>
    </div>
<?php } ?>
<div class="row" id="formdiv_3">
    <div class="large-6 columns">
        <div class="panel eq">
            <form action="<?php echo route('importrepo'); ?>" method="post">
                <div class="control-group">
                    <label class="control-label" for="textinput">Your repository url</label>

                    <div class="controls">
                        <input id="textinput" name="giturl" placeholder="Enter your Git Url here"
                               class="input-xlarge"
                               type="text"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="gitbutton"></label>

                    <div class="controls">
                        <button id="gitbutton" name="gitbutton" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="large-6 columns">
        <div class="panel eq">
            <label>Upload packaged App (.zip) or Add-On (.xpi)</label>
            <!-- The element where Fine Uploader will exist. -->
            <div id="fine-uploader">
            </div>
        </div>
    </div>
</div>
</div>
<div class="clear"></div>
<div class="row">
    <div class="large-12 columns">
        <div id="messages" class="panel"></div>
    </div>
</div>