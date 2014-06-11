<?php
echo Theme::partial('repos.header', array('git' => $git,
    'page' => $page,
    'project' => $project));
?>
<div class="row">
    <div class="large-12 columns">
        <table id="projects" style="width: 100%">
            <thead>
            <tr>
                <th>Project</th>
                <th>Description</th>
                <th>Last Commit</th>
                <th>Last Change</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($page['projects'] as $p) {
                $tr_class = $tr_class == "odd" ? "even" : "odd";
                echo "<tr class=\"$tr_class\">\n";
                echo "\t<td><a href=\"" . route('reposummary', array('project' => $p[name])) . "\">$p[name]</a>";
                if ($p['www']) {
                    //echo "<a href=\"$p[www]\" class=\"external\">&#8599;</a>";
                    tpl_extlink($p['www']);
                }
                echo "</td>\n";
                echo "\t<td>" . $git->htmlentities_wrapper($p['description']) . "</td>\n";
                echo "\t<td>" . $git->htmlentities_wrapper($p['message']) . "</td>\n";
                echo "\t<td>" . $git->htmlentities_wrapper($p['head_datetime']) . "</td>\n";
                echo "\t<td>";
                echo "<a href=\"" . $git->makelink(
                        array('a' => 'tree', 'gp' => $p['name'], 'h' => $p['head_tree'], 'hb' => $p['head_hash'])
                    ) . "\" class=\"tree_link\" title=\"Tree\">tree</a>";
                echo " <a href=\"" . $git->makelink(
                        array(
                            'a' => 'archive',
                            'p' => $p['name'],
                            'h' => $p['head_tree'],
                            'hb' => $p['head_hash'],
                            't' => 'targz'
                        )
                    ) . "\" rel=\"nofollow\" class=\"tar_link\" title=\"tar/gz\">tar/gz</a>";
                echo " <a href=\"" . $git->makelink(
                        array(
                            'a' => 'archive',
                            'p' => $p['name'],
                            'h' => $p['head_tree'],
                            'hb' => $p['head_hash'],
                            't' => 'zip'
                        )
                    ) . "\" rel=\"nofollow\" class=\"zip_link\" title=\"zip\">zip</a>";
                echo "</td>\n";
                echo "</tr>\n";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>