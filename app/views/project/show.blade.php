<div class="row">
    <div class="large-3 columns">
        <h2 class="media-heading center_text"><i><?= $project->name; ?></i></h2>
        <img class="center"
             src="<?php echo $search->appInfo['icons']['48']; ?>"/>
        <h4 class="center_text">by&nbsp;<?php echo Encoding::fixUTF8(
                TextHelper::word_wrap($manifest['developer']['name'])
            ); ?></h4>
    </div>
    <div class="large-9 columns">
        <p class="well" id="summary-text" style="font-size: 1.25em; padding-top:20px; margin-top: 0px;">
            <?php echo WtsHelper::makeClickableLinks($search->appInfo['description'][$search->appInfo['default_locale']]); ?>
        </p>
    </div>
</div>
<div class="row">
    <div class="columns large-9">
        <div class="row">
            <div class="widgetwrap">
                <div class="widget feature-posts">
                    <h4 class="widgettitle" style="margin-bottom:0;"><i><?= $project->name; ?></i> on BabelZilla</h4>

                    <div style="display: table; width: 100%; text-align: left;">
                        <div class="large-12 columns" style="display: table-row">
                            <div class="large-4 columns" style="display: table-cell">
                                Maintainer
                            </div>
                            <div class="large-8 columns" style="display: table-cell">
                                Add maintainers here
                            </div>
                        </div>
                        <div class="large-12 columns" style="display: table-row">
                            <div class="large-4 columns" style="display: table-cell">
                                Creator
                            </div>
                            <div class="large-8 columns" style="display: table-cell">
                                <?php echo Encoding::fixUTF8($search->appInfo['author']); ?>
                            </div>
                        </div>
                        <div class="large-12 columns" style="display: table-row">
                            <div class="large-4 columns" style="display: table-cell">
                                Version
                            </div>
                            <div class="large-8 columns" style="display: table-cell">
                                <?php echo $manifest['version']; ?>
                            </div>
                        </div>
                        <div class="large-12 columns" style="display: table-row">
                            <div class="large-4 columns" style="display: table-cell">
                                Planned release date
                            </div>
                            <div class="large-8 columns" style="display: table-cell">
                                <?php echo $project->release_date; ?>
                            </div>
                        </div>
                        <div class="large-12 columns" style="display: table-row">
                            <div class="large-4 columns" style="display: table-cell">
                                Last updated at
                            </div>
                            <div class="large-8 columns" style="display: table-cell">
                                <?php echo $project->updated_at; ?>
                            </div>
                        </div>
                        <div class="large-12 columns" style="display: table-row">
                            <div class="large-4 columns" style="display: table-cell">
                                License
                            </div>
                            <div class="large-8 columns" style="display: table-cell">
                                <?php echo $license; //->name; ?>
                            </div>
                        </div>
                        <div class="large-12 columns" style="display: table-row">
                            <div class="large-4 columns" style="display: table-cell">
                                Website
                            </div>
                            <div class="large-8 columns" style="display: table-cell">
                                <a href="<?php echo $manifest['developer']['url']; ?>"><?php echo $manifest['developer']['url']; ?></a>
                            </div>
                        </div>
                        <div class="large-12 columns" style="display: table-row">
                            <div class="large-4 columns" style="display: table-cell">
                                Support topic
                            </div>
                            <div class="large-8 columns" style="display: table-cell">
                                <a href='<?php echo $board__show_topic_url . $project->topic_id; ?>'>Show topic</a>
                            </div>
                        </div>
                        <div class="large-12 columns" style="display: table-row">
                            <div class="large-4 columns" style="display: table-cell">
                                Compatibility
                            </div>
                            <div class="large-8 columns" style="display: table-cell">
                                <?php
                                if (count($search->appInfo['device_types']))
                                    echo implode(', ', $search->appInfo['device_types']);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="large-3 columns">
        <?php echo Theme::partial('project.marketplace', array('search' => $search)); ?>
    </div>
</div>
<div class="row">
    <div class="carousel slide previews large-8 large-offset-2 columns" id="myCarousel2">
        <div class="carousel-inner">
            <?php //print_r($this->images)
            $i = 1;
            foreach ($search->appInfo['previews'] as $image)
            {
            if ($i == 1) {
            ?>
            <div class="item active">
                <ul class="thumbnails">
                    <?php
                    } else {
                    if ($i % 3 == 1) {
                    ?>
                </ul>
            </div>
            <div class="item">
                <ul class="thumbnails">
                    <?php
                    }
                    }?>
                    <li class="grid_3">
                        <div class="thumbnail" style="min-height: 150px;">
                            <a href="<?php echo $image['image_url'] ?>" class="" rel="prettyPhoto[pp_gal]"
                               title=""><img src="<?php echo $image['thumbnail_url'] ?>"
                                             alt="" style="margin: auto;"/></a>
                        </div>
                    </li>
                    <?php
                    $i++;
                    }
                    ?>
                </ul>
            </div>
        </div>
        <a data-slide="prev" href="#myCarousel2" class="left carousel-control">â€¹</a>
        <a data-slide="next" href="#myCarousel2" class="right carousel-control">â€º</a>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <table class="table-bordered" id="translations">
            <thead align="left" valign="middle">
            <tr>
                <th>Language</th>
                <th>Progress</th>
                <th>Translated</th>
                <th></th>
                <th>Status</th>
                <th>translated / missing</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($translationSets as $tSet) {
                $TranslatedCount = $tSet->translatedStrings()->count();
                /*$TranslatedCount = GpTranslations::Model()->countByAttributes(
                    array('project_id' => $this->project->project_id, 'language' => $tSet->locale)
                );*/
                $OriginalCount = $project->originalStrings()
                    ->count();

                /*$OriginalCount = GpOriginals::Model()->countByAttributes(
                    array(
                        'project_id' => $this->project->project_id,
                    )
                );*/
                if ($OriginalCount == 0) {
                    $percentageDone = 0;
                } else {
                    $percentageDone = intval($TranslatedCount / $OriginalCount * 100);
                }
                //$percentageDone = intval($TranslatedCount / $OriginalCount * 100);
                $percentageMissing = 100 - $percentageDone;
                $missingCount = $OriginalCount - $TranslatedCount;
                $link = route('projectfilelist', array(
                    'project' => $project->slug,
                    'language' => $tSet->locale,
                ));
                ?>
                <tr>
                    <td>
                        <a href="<?php echo $link; ?>"><?php echo $tSet->locale ?></a>
                    </td>
                    <td>
                        <div class="round nice progress success" style="margin-top: 0.5rem;"><span class="meter"
                                                                                                   style="width: <?php echo $percentageDone ?>%"></span>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        <?php if ($tSet->status_id == 7) { ?>
                            <div class="label label-success celllabel" style="text-align:center; width: auto; ">released
                            </div>
                        <?php } elseif ($tSet->status_id == 6) { ?>
                            <div class="label label-warning celllabel" style="text-align:center;">needs review</div>
                        <?php } elseif ($tSet->status_id == 5) { ?>
                            <div class="label label-warning celllabel" style="text-align:center;">testing / QA</div>
                        <?php } elseif ($tSet->status_id == 4) { ?>
                            <div class="label label-warning celllabel" style="text-align:center;">in progress</div>
                        <?php } elseif ($tSet->status_id == 3) { ?>
                            <div class="label celllabel" style="text-align:center;">resigned</div>
                        <?php } elseif ($tSet->status_id == 2) { ?>
                            <div class="label label-important celllabel" style="text-align:center;">needs update</div>
                        <?php } else { ?>
                            <div class="label label-notice celllabel" style="text-align:center;">unknown Translator
                            </div>
                        <?php } ?>
                    </td>
                    <td><?php echo $TranslatedCount . ' / ' . $OriginalCount; ?></td>
                </tr>
            <?php } //print_r(Capsule::getQueryLog());?>
            </tbody>
        </table>
    </div>
    @include('fbf.laravel.comments.comments', array('commentable' => $project, 'comments' => $project->comments))
</div>