<?= $sel; ?>
<div id="statistics" class="well lightgrey-well large-12 columns">
    <div class="one columns center_block text-center<?php if ($sel == 'total') {
        echo ' selected';
    } ?>">
        <a href="<?php echo route('translatefile', array(
            'project' => $project->project_id,
            'language' => $lang,
            'translate' => $file,
            'show' => 'all',
            // always start on page one
            'page' => 1,
        ));?>"><h3>Total</h3>
            <span class="segment_count badge"><?php echo $originalcnt ?></span>
        </a>
    </div>
    <div class="one columns center_block text-center<?php if ($sel == 'translated') {
        echo ' selected';
    } ?>">
        <a href="<?php echo route('translatefile', array(
            'project' => $project->project_id,
            'language' => $lang,
            'translate' => $file,
            'show' => 'translated',
            // always start on page one
            'page' => 1,
        ));?>"><h3>Translated</h3>
            <span class="segment_count badge badge-translated"><?php echo $translatedcnt; ?></span>
        </a>
    </div>
    <div class="one columns center_block text-center<?php if ($sel == 'to_verify') {
        echo ' selected';
    } ?>">
        <a href="<?php echo route('translatefile', array(
            'project' => $project->project_id,
            'language' => $lang,
            'translate' => $file,
            'show' => 'verfify',
            // always start on page one
            'page' => 1,
        ));?>"><h3>To verify</h3>
            <span class="segment_count badge badge-verify"><?php echo $reverifycount; ?></span>
        </a>
    </div>
    <div class="one columns center_block text-center<?php if ($sel == 'unapproved') {
        echo ' selected';
    } ?>">
        <a href="<?php echo route('translatefile', array(
            'project' => $project->project_id,
            'language' => $lang,
            'translate' => $file,
            'show' => 'unapproved',
            // always start on page one
            'page' => 1,
        ));?>>"><h3>Unproofed</h3>
            <span class="segment_count badge badge-unproofed"><?php echo $unproofedcount; ?></span>
        </a>
    </div>
    <div class="one columns center_block text-center<?php if ($sel == 'untranslated') {
        echo ' selected';
    } ?>">
        <a href="<?php echo route('translatefile', array(
            'project' => $project->project_id,
            'language' => $lang,
            'translate' => $file,
            'show' => 'untranslated',
            // always start on page one
            'page' => 1,
        ));?>"><h3>Missing</h3>
            <span class="badge badge-untranslated"><?php echo $missing ?></span>
        </a>
    </div>
    <div class="one columns center_block text-center<?php if ($sel == 'obsolete') {
        echo ' selected';
    } ?>">
        <a href="#" title="0 words Â· 0 characters"><h3>Obsolete</h3>
            <span class="segment_count badge badge-removed">0</span>
        </a>
    </div>
    <div class="one columns center_block text-center<?php if ($sel == 'rejected') {
        echo ' selected';
    } ?>">
        <a href="#" title="0 words Â· 0 characters"><h3>Rejected</h3>
            <span class="segment_count badge badge-rejected">0</span>
        </a>
    </div>
    <div class="five columns"></div>
    <div class="clear"></div>
</div>
<div class="row">
    <div class="large-12 columns">
        <dl class="sub-nav">
            <dt>Filter:</dt>
            <dd class="<?php if ($sel == 'total') echo 'active'; ?>">
                <a href="<?php echo route('translatefile', array(
                    'project' => $project->project_id,
                    'language' => $lang,
                    'translate' => $file,
                    'show' => 'all',
                    // always start on page one
                    'page' => 1,
                ));?>">Total</a></dd>
            <dd class="<?php if ($sel == 'translated') echo 'active'; ?>">
                <a href="<?php echo route('translatefile', array(
                    'project' => $project->project_id,
                    'language' => $lang,
                    'translate' => $file,
                    'show' => 'translated',
                    // always start on page one
                    'page' => 1,
                ));?>">Translated</a></dd>
            <dd class="<?php if ($sel == 'to_verfiy') echo 'active'; ?>">
                <a href="<?php echo route('translatefile', array(
                    'project' => $project->project_id,
                    'language' => $lang,
                    'translate' => $file,
                    'show' => 'verfify',
                    // always start on page one
                    'page' => 1,
                ));?>">To verify</a></dd>
            <dd class="<?php if ($sel == 'unapproved') echo 'active'; ?>">
                <a href="<?php echo route('translatefile', array(
                    'project' => $project->project_id,
                    'language' => $lang,
                    'translate' => $file,
                    'show' => 'unapproved',
                    // always start on page one
                    'page' => 1,
                ));?>">Unproofed</a></dd>
            <dd class="<?php if ($sel == 'untranslated') echo 'active'; ?>">
                <a href="<?php echo route('translatefile', array(
                    'project' => $project->project_id,
                    'language' => $lang,
                    'translate' => $file,
                    'show' => 'untranslated',
                    // always start on page one
                    'page' => 1,
                ));?>">Missing</a></dd>
            <dd><a href="#">Obsolete</a></dd>
            <dd><a href="#">Rejected</a></dd>
        </dl>
    </div>
</div>