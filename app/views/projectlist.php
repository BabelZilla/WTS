<div class="row display">
    <div class="large-10 columns"><h2>List of projects</h2></div>
    <div class="large-2 columns"><a href="<?php echo route('projectupload'); ?>" class="button">Add a project</a></div>
</div>
<div class="row">
    <div class="twelve columns">
        <table cellspacing="0" cellpadding="0" width="100%" id="allWebapps">
            <thead align="left" valign="middle">
            <tr>
                <th>Name</th>
                <th>Action</th>
                <th>Last update</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($projects as $project) {
                $link = route('projectdownload', array($project->slug));
                $dl_link = '<a href="' . $link . '">' . '<i class="fa fa-download fa-2x fa-border"></i>' . '</a>';
                $topic_link = '<a href="forum/index.php?showtopic=' . $project->topic_id . '">' . '<i class="fa fa-comments fa-2x fa-border"></i>' . '</a>';
                $settings_link = '<a href="index.php?option=com_dashboard&type=edit&project=' . $project->slug . '">' . '<i class="fa fa-cog fa-2x fa-border"></i>' . '</a>';
                $BZrepo_link = '<a href="' . route('reposummary', array($project->slug)) . '"' . '<i class="fa fa-git fa-2x fa-border"></i>' . '</a>';
                $action = $dl_link . $topic_link . $BZrepo_link;
                $extname_ver = utf8_encode(addslashes($project->name) . "&nbsp;" . $project->ext_ver);
                $params = array('id' => $project->id);
                $last_update = $project->updated_at;
                $link = HTML::linkRoute('project', $project->name, array($project->slug));?>
                <tr>
                    <td><?= $link ?></td>
                    <td><?= $action ?></td>
                    <td><?= $last_update ?></td>
                </tr>
            <?
            }
            ?>
            </tbody>
        </table>
    </div>
</div>