<style>
    .norm a {
        background: none !important;
        color: #2BA6CB;
    }

    .vertical-align {
        position: relative;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }
</style>
<div class="row">
    <div class="columns large-12">
        <dl class="tabs" data-tab>
            <dd class="active"><a href="#panel2-1">Projects</a></dd>
            <dd><a href="#panel2-2">Translations</a></dd>
            <dd><a href="#panel2-4"><i class="fa fa-info-circle"> Notifications</i></a></dd>
            <dd><a href="#panel2-5"><i class="fa fa-cogs"> Settings</i></a></dd>
            <dd><a href="#panel2-6"><i class="fa fa-github"> Github</i></a></dd>
        </dl>
        <div class="tabs-content">
            <div class="content active" id="panel2-1">
                <table cellspacing="0" cellpadding="0" width="100%" id="allWebapps" class="norm">
                    <thead align="left" valign="middle">
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Last update</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach ($projects as $project) {
                        $link = route('projectdownload', array($project->project_id));
                        $dl_link = '<a href="' . $link . '">' . '<i class="fa fa-download fa-2x fa-border"></i>' . '</a>';
                        $topic_link = '<a href="forum/index.php?showtopic=' . $project->topic_id . '">' . '<i class="fa fa-comments fa-2x fa-border"></i>' . '</a>';
                        $link = route('editproject', array($project->project_id));
                        $settings_link = '<a href="' . $link . '">' . '<i class="fa fa-cog fa-2x fa-border"></i>' . '</a>';
                        $BZrepo_link = '<a href="' . route('reposummary', array($project->project_id)) . '"' . '<i class="fa fa-git fa-2x fa-border"></i>' . '</a>';
                        $action = $dl_link . $topic_link . $settings_link . $BZrepo_link;
                        $extname_ver = utf8_encode(addslashes($project->name) . "&nbsp;" . $project->ext_ver);
                        $params = array('id' => $project->id);
                        //$link = action('project',$project->name);
                        $link = HTML::linkRoute('project', $project->name, array($project->project_id));?>
                        <tr>
                            <td style="vertical-align:middle"><?= $link ?></td>
                            <td class="text-center" style="vertical-align:middle"><?= $project->updated_at ?></td>
                            <td class="text-center"><?= $action ?></td>
                        </tr>
                    <?
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="content"
                 id="panel2-2"><?php echo Theme::partial('dashboard.translations', array('translations' => $translations));; ?></div>
            <div class="content" id="panel2-4"><p>Fourth panel content goes here...</p></div>
            <div class="content"
                 id="panel2-5"><?php echo Theme::partial('dashboard.settings', array('projects' => '')); ?></div>
            <div class="content"
                 id="panel2-6"><?php echo Theme::partial('dashboard.repos', array('repositories' => $repositories,
                    'repo_html' => $repo_html));?></div>
        </div>
    </div>
</div>