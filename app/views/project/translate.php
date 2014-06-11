<script>
    var laravel_data = '<?php echo json_encode((array)$js_data); ?>';
    data = JSON.parse(laravel_data);
    var hello = data.hello;
    var project = <?php echo $project->project_id?>;
    var language = '<?php echo $lang?>';
    var file = <?php echo $file_id?>;
    var ofile = <?php echo $OFile->file_id?>;
    var pluralrule = '<?php echo json_encode($PluralRule); ?>';
</script>

<h3>Translate <?php echo "$TFile->file_name"; ?></h3>
<?php
echo Theme::partial('project.statistics', array('sel' => $sel,
    'lang' => $lang,
    'project' => $project,
    'file' => $file,
    'show' => $show,
    'page' => $page,
    'originalcnt' => $originalcnt,
    'reverifycount' => $reverifycount,
    'translatedcnt' => $translatedcnt,
    'unproofedcount' => $unproofedcount,
    'missing' => $missing,
));
echo $pagination->showPage();
foreach ($dataProvider as $entity) {
    $translatedstr = translatedStrings::where('project_id', '=', $project->project_id)
        ->where('original_id', '=', $entity->id)
        ->where('language', '=', $lang)
        ->first();
    $orgstr = $translatedstr;
    // @todo check the needed variables
    echo Theme::partial('project.translationrow', array('sel' => $sel,
        'lang' => $lang,
        'project' => $project,
        'file' => $file,
        'show' => $show,
        'page' => $page,
        'originalcnt' => $originalcnt,
        'reverifycount' => $reverifycount,
        'translatedcnt' => $translatedcnt,
        'unproofedcount' => $unproofedcount,
        'missing' => $missing,
        'translatedstr' => $translatedstr,
        'orgstr' => $orgstr,
        'entity' => $entity,
        'PluralRules' => $PluralRules,
    ));
}
?>
<div class="row">
    <div class="large-12 columns">
        <?php
        echo $pagination->showPage();
        ?>
    </div>
</div>

<div id="sModal" class="reveal-modal large" data-reveal>
    <h2 id="myModalLabel" style="padding: 0;">Preview</h2>

    <div class="modal-body">
        <h2></h2>

        <p class="lead"></p>

        <p></p>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button id="savebtn" class="btn btn-primary savesuggest">Save changes</button>
            <button id="newbtn" class="btn btn-success addsuggest">Add new</button>
            <button id="deletebtn" class="btn btn-danger deletesuggest">Delete</button>
        </div>
    </div>
    <a class="close-reveal-modal">&#215;</a>
</div>
<h1 id="h01"></h1>
