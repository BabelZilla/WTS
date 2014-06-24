<script>
    var language = '{{ App::getlocale() }}'
</script>

<div class="row display">
    <div class="large-10 columns"><h3 class="wtstitle">{{ Trans('wts.projectlist') }}</h3></div>
    <div class="large-2 columns"><a href="<?php echo route('projectupload'); ?>" class="button">{{
            Trans('wts.addproject') }}</a></div>
</div>
<div class="row">
    <div class="twelve columns">
        <table cellspacing="0" cellpadding="0" width="100%" id="allWebapps">
            <thead align="left" valign="middle">
            <tr>
                <th>{{ Trans('wts.projectname') }}</th>
                <th>{{ Trans('wts.projectaction') }}</th>
                <th>{{ Trans('wts.projectlastupdate') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($projects as $project)
            <?php
            $link = route('projectdownload', array($project->slug));
            $dl_link = '<a href="' . $link . '">' . '<i class="fa fa-download fa-2x fa-border"></i>' . '</a>';
            $topic_link = '<a href="forum/index.php?showtopic=' . $project->topic_id . '">' . '<i class="fa fa-comments fa-2x fa-border"></i>' . '</a>';
            $settings_link = '<a href="' . $project->slug . '">' . '<i class="fa fa-cog fa-2x fa-border"></i>' . '</a>';
            $BZrepo_link = '<a href="' . route('reposummary', array($project->slug)) . '"' . '<i class="fa fa-git fa-2x fa-border"></i>' . '</a>';
            $action = $dl_link . $topic_link . $BZrepo_link;
            $extname_ver = utf8_encode(addslashes($project->name) . "&nbsp;" . $project->ext_ver);

            ?>
            <tr>
                <td>{{ HTML::linkRoute('project', $project->name, array($project->slug)) }}</td>
                <td>{{ $action }}</td>
                <td>{{ WtsHelper::localeDate($project->updated_at, $settings['dateformat']) }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>