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
            <dd class="<?php if ($sel == 'to_verify') echo 'active'; ?>">
                <a href="<?php echo route('translatefile', array(
                    'project' => $project->project_id,
                    'language' => $lang,
                    'translate' => $file,
                    'show' => 'verify',
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