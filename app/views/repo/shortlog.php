<?php
echo Theme::partial('repos.header', array('git' => $git,
    'page' => $page,
    'project' => $project));
?>
<h3>Shortlog</h3>
<div class="row">
    <div class="large-12 columns">
        <table class="table table-striped table-bordered" id="shortlog" style="width: 100%;">
            <thead>
            <tr>
                <th class="date">Date</th>
                <th class="author">Author</th>
                <th class="message">Message</th>
                <th class="actions" style="width: 20%;">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $page['lasthash'] = 'HEAD';
            foreach ($page['shortlog'] as $l) {
                $tr_class = $tr_class == "odd" ? "even" : "odd";
                echo "<tr class=\"$tr_class\">\n";
                echo "\t<td>$l[date]</td>\n";
                echo "\t<td>" . $git->format_author($l['author']) . "</td>\n";
                echo "\t<td><a href=\"" . $git->makelink(
                        array('a' => 'commit', 'p' => $page['project'], 'h' => $l['commit_id'])
                    ) . "\">" . $git->htmlentities_wrapper($l['message']) . "</a>";
                if (count($l['refs']) > 0) {
                    foreach ($l['refs'] as $ref) {
                        $parts = explode('/', $ref);
                        $shortref = join('/', array_slice($parts, 1));
                        $type = 'head';
                        if ($parts[0] == 'tags') {
                            $type = 'tag';
                        } elseif ($parts[0] == 'remotes') {
                            $type = 'remote';
                        }
                        echo "&nbsp;<span class=\"label $type\" title=\"$ref\">" . $git->htmlentities_wrapper(
                                $shortref
                            ) . "</span>";
                    }
                }
                echo "</td>\n";
                echo "\t<td>";
                echo "<a href=\"" . $git->makelink(
                        array('a' => 'commitdiff', 'p' => $page['project'], 'h' => $l['commit_id'])
                    ) . "\" class=\"cdiff_link\" title=\"Commit Diff\">commitdiff</a>";
                echo " <a href=\"" . $git->makelink(
                        array('a' => 'tree', 'p' => $page['project'], 'h' => $l['tree'], 'hb' => $l['commit_id'])
                    ) . "\" class=\"tree_link\" title=\"Tree\">tree</a>";
                echo " <a href=\"" . $git->makelink(
                        array(
                            'a' => 'archive',
                            'p' => $page['project'],
                            'h' => $l['tree'],
                            'hb' => $l['commit_id'],
                            't' => 'targz'
                        )
                    ) . "\" rel=\"nofollow\" class=\"tar_link\" title=\"tar/gz\">tar/gz</a>";
                echo " <a href=\"" . $git->makelink(
                        array(
                            'a' => 'archive',
                            'p' => $page['project'],
                            'h' => $l['tree'],
                            'hb' => $l['commit_id'],
                            't' => 'zip'
                        )
                    ) . "\" rel=\"nofollow\" class=\"zip_link\" title=\"zip\">zip</a>";
                echo " <a href=\"" . $git->makelink(
                        array('a' => 'patch', 'p' => $page['project'], 'h' => $l['commit_id'])
                    ) . "\" class=\"patch_link\" title=\"Patch\">patch</a>";
                echo "</td>\n";
                echo "</tr>\n";
                $page['lasthash'] = $l['commit_id'];
            }
            ?>
            </tbody>
        </table>
    </div>
</div>


<?php
if ($page['lasthash'] !== 'HEAD' && !isset($page['shortlog_no_more'])) {
    echo "<p>";
    for ($i = 0; $i < $page['pg']; $i++) {
        echo "<a href=\"" . $git->makelink(
                array('a' => 'shortlog', 'p' => $page['project'], 'h' => $page['ref'], 'pg' => $i)
            ) . "\">$i</a> ";
    }
    echo "<a href=\"" . $git->makelink(
            array('a' => 'shortlog', 'p' => $page['project'], 'h' => $page['ref'], 'pg' => $page['pg'] + 1)
        ) . "\">more &raquo;</a>";
    echo "</p>";
}
?>
 