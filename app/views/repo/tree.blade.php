<?php
echo Theme::partial('repos.header', array('git' => $git,
    'page' => $page,
    'project' => $project));
?>
<table class="tree table table-striped table-bordered" id="tree" style="width: 100%;">
    <thead>
    <tr>
        <th class="perm">Permissions</th>
        <th class="name">Name</th>
        <th class="dl">Download</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($page['entries'] as $e) {
        $tr_class = $tr_class == "odd" ? "even" : "odd";

        if (strlen($page['path']) > 0) {
            $path = $page['path'] . '/' . $e['name'];
        } else {
            $path = $e['name'];
        }
        if ($e['type'] === 'blob') {
            echo "<tr class=\"blob $tr_class\">\n";
            echo "\t<td>$e[mode]</td>\n";
            echo "\t<td><a href=\"" . $git->makelink(
                    array(
                        'a' => 'viewblob',
                        'p' => $page['project'],
                        'h' => $e['hash'],
                        'hb' => $page['commit_id'],
                        'f' => $path
                    )
                ) . "\" class=\"item_name\">" . htmlspecialchars($e['name']) . "</a></td>\n";
            echo "\t<td><a href=\"" . $git->makelink(
                    array('a' => 'blob', 'p' => $page['project'], 'h' => $e['hash'], 'n' => $e['name'])
                ) . "\">blob</a></td>\n";
        } else {
            echo "<tr class=\"dir $tr_class\">\n";
            echo "\t<td>$e[mode]</td>\n";
            echo "\t<td><a href=\"" . $git->makelink(
                    array(
                        'a' => 'tree',
                        'p' => $page['project'],
                        'h' => $e['hash'],
                        'hb' => $page['commit_id'],
                        'f' => $path
                    )
                ) . "\" class=\"item_name\">" . htmlspecialchars($e['name']) . "/</a></td>\n";
            echo "\t<td><a href=\"" . $git->makelink(
                    array(
                        'a' => 'archive',
                        'p' => $page['project'],
                        'h' => $e['hash'],
                        'hb' => $page['commit_id'],
                        't' => 'targz',
                        'n' => $e['name']
                    )
                ) . "\" class=\"tar_link\" title=\"tar/gz\">tar.gz</a> <a href=\"" . $git->makelink(
                    array(
                        'a' => 'archive',
                        'p' => $page['project'],
                        'h' => $e['hash'],
                        'hb' => $page['commit_id'],
                        't' => 'zip',
                        'n' => $e['name']
                    )
                ) . "\" class=\"zip_link\" title=\"zip\">zip</a></td>\n";
        }
        echo "</tr>\n";
    }
    ?>
    </tbody>
</table>

<p>Download as <a href="<?php echo $git->makelink(
        array(
            'a' => 'archive',
            'p' => $page['project'],
            'h' => $page['tree_id'],
            'hb' => $page['commit_id'],
            't' => 'targz'
        )
    ) ?>" rel="nofollow">tar.gz</a> or <a href="<?php echo $git->makelink(
        array(
            'a' => 'archive',
            'p' => $page['project'],
            'h' => $page['tree_id'],
            'hb' => $page['commit_id'],
            't' => 'zip'
        )
    ) ?>" rel="nofollow">zip</a>. Browse this tree at the <a href="<?php echo $git->makelink(
        array('a' => 'tree', 'p' => $page['project'], 'hb' => 'HEAD', 'f' => $page['path'])
    ); ?>">HEAD</a>.</p>

 