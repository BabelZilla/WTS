<script>
    var language = '{{ App::getlocale() }}'
</script>
<div class="row">
    <div class="large-3 columns">
        <h2 class="media-heading center_text"><i>{{ $project->name }}</i></h2>
        @if ($search)
        <img class="center"
             src="{{ $search->appInfo['icons']['48'] }}"/>
        @endif
        <h4 class="center_text">{{ Trans('wts.by') }}&nbsp;<?php echo Encoding::fixUTF8(
                TextHelper::word_wrap($manifest['developer']['name'])
            ); ?></h4>
    </div>
    <div class="large-9 columns">
        <p class="well" id="summary-text" style="font-size: 1.25em; padding-top:20px; margin-top: 0px;">
            {{ $description }}
        </p>
    </div>
</div>
<div class="row">
    <div class="columns large-9">
        <div class="row">
            <div class="widgetwrap">
                <div class="widget feature-posts">
                    <h4 class="widgettitle" style="margin-bottom:0;"><i>{{ $project->name }}</i> {{
                        Trans('wts.projectonbz') }}</h4>

                    <div style="display: table; width: 100%; text-align: left;">
                        <div class="large-12 columns" style="display: table-row">
                            <div class="large-4 columns" style="display: table-cell">
                                {{ Trans('wts.maintainer') }}
                            </div>
                            <div class="large-8 columns" style="display: table-cell">
                                Add maintainers here
                            </div>
                        </div>
                        <div class="large-12 columns" style="display: table-row">
                            <div class="large-4 columns" style="display: table-cell">
                                {{ Trans('wts.creator') }}
                            </div>
                            <div class="large-8 columns" style="display: table-cell">
                                {{ Encoding::fixUTF8($manifest['developer']['name']) }}
                            </div>
                        </div>
                        <div class="large-12 columns" style="display: table-row">
                            <div class="large-4 columns" style="display: table-cell">
                                {{ Trans('wts.version') }}
                            </div>
                            <div class="large-8 columns" style="display: table-cell">
                                {{ $manifest['version'] }}
                            </div>
                        </div>
                        <div class="large-12 columns" style="display: table-row">
                            <div class="large-4 columns" style="display: table-cell">
                                {{ Trans('wts.releasedate') }}
                            </div>
                            <div class="large-8 columns" style="display: table-cell">
                                {{ $project->release_date }}
                            </div>
                        </div>
                        <div class="large-12 columns" style="display: table-row">
                            <div class="large-4 columns" style="display: table-cell">
                                {{ Trans('wts.projectlastupdate') }}
                            </div>
                            <div class="large-8 columns" style="display: table-cell">
                                {{ $project->updated_at }}
                            </div>
                        </div>
                        <div class="large-12 columns" style="display: table-row">
                            <div class="large-4 columns" style="display: table-cell">
                                {{ Trans('wts.license') }}
                            </div>
                            <div class="large-8 columns" style="display: table-cell">
                                {{ $license }}
                            </div>
                        </div>
                        <div class="large-12 columns" style="display: table-row">
                            <div class="large-4 columns" style="display: table-cell">
                                {{ Trans('wts.projectwebsite') }}
                            </div>
                            <div class="large-8 columns" style="display: table-cell">
                                <a href="{{ $manifest['developer']['url'] }}">{{ $manifest['developer']['url'] }}</a>
                            </div>
                        </div>
                        <div class="large-12 columns" style="display: table-row">
                            <div class="large-4 columns" style="display: table-cell">
                                {{ Trans('wts.projectsupport') }}
                            </div>
                            <div class="large-8 columns" style="display: table-cell">
                                <a href='{{ $board__show_topic_url . $project->topic_id }}'>{{
                                    Trans('wts.projectshowtopic') }}</a>
                            </div>
                        </div>
                        <div class="large-12 columns" style="display: table-row">
                            <div class="large-4 columns" style="display: table-cell">
                                {{ Trans('wts.compat') }}
                            </div>
                            <div class="large-8 columns" style="display: table-cell">
                                @if($search)
                                @if (count($search->appInfo['device_types']))
                                {{ implode(', ', $search->appInfo['device_types']) }}
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="large-3 columns">
        @include('project.partials.marketplace', array('search' => $search))
    </div>
</div>
@if ($search)
@if ($search->appInfo['previews'])
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
@endif
@endif
<div class="row">
    <div class="large-12 columns">
        <table class="table-bordered" id="translations">
            <thead align="left" valign="middle">
            <tr>
                <th>{{ Trans('wts.language') }}</th>
                <th>{{ Trans('wts.progress') }}</th>
                <th>{{ Trans('wts.translated') }}</th>
                <th></th>
                <th>{{ Trans('wts.projectstatus') }}</th>
                <th>{{ Trans('wts.trans_missing') }}</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($translationSets as $tSet) {
                $TranslatedCount = $tSet->translatedStrings()->count();
                $OriginalCount = $project->originalStrings()
                    ->count();
                if ($OriginalCount == 0) {
                    $percentageDone = 0;
                } else {
                    $percentageDone = intval($TranslatedCount / $OriginalCount * 100);
                }
                $percentageMissing = 100 - $percentageDone;
                $missingCount = $OriginalCount - $TranslatedCount;
                $link = route('projectfilelist', array(
                    'project' => $project->slug,
                    'language' => $tSet->locale,
                ));
                ?>
                <tr>
                    <td>
                        <a href="{{ $link }}">{{ $tSet->locale }}</a>
                    </td>
                    <td>
                        <div class="round nice progress success" style="margin-top: 0.5rem;"><span class="meter"
                                                                                                   style="width: {{ $percentageDone }}%"></span>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        @if ($tSet->status_id == 6)
                        <div class="label label-success celllabel">{{ Trans('wts.status_released') }}
                        </div>
                        @elseif ($tSet->status_id == 5)
                        <div class="label label-warning celllabel">{{ Trans('wts.status_review') }}</div>
                        @elseif ($tSet->status_id == 4)
                        <div class="label label-warning celllabel">{{ Trans('wts.status_testing') }}</div>
                        @elseif ($tSet->status_id == 3)
                        <div class="label label-warning celllabel">{{ Trans('wts.status_inprogress') }}</div>
                        @elseif ($tSet->status_id == 2)
                        <div class="label celllabel">{{ Trans('wts.status_resigned') }}</div>
                        @elseif ($tSet->status_id == 1)
                        <div class="label label-important text-center">{{ Trans('wts.status_update') }}</div>
                        @else
                        <div class="label label-notice celllabel">{{ Trans('wts.status_unknown') }}
                        </div>
                        @endif
                    </td>
                    <td>{{ $TranslatedCount . ' / ' . $OriginalCount }}</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    @include('fbf.laravel.comments.comments', array('commentable' => $project, 'comments' => $project->comments))
</div>