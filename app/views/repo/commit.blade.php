<?php
echo Theme::partial('repos.header', array('git' => $git,
    'page' => $page,
    'project' => $project));
?>
<div class="row">
    <div class="large-12">
        <h3><?php echo $git->htmlentities_wrapper($page['message_firstline']); ?></h3>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        <table class="table table-striped table-bordered" id="commit" style="width: 100%;">
            <tbody>
            <tr>
                <td>Author</td>
                <td><?php echo $git->format_author($page['author_name']); ?>
                    &lt;<?php echo $git->htmlentities_wrapper($page['author_mail']); ?>&gt;</td>
            </tr>
            <tr>
                <td>Author date</td>
                <td><?php echo $page['author_datetime']; ?></td>
            </tr>
            <tr>
                <td>Author local date</td>
                <td><?php echo $page['author_datetime_local']; ?></td>
            </tr>
            <tr>
                <td>Committer</td>
                <td><?php echo $git->format_author($page['committer_name']); ?>
                    &lt;<?php echo $git->htmlentities_wrapper($page['committer_mail']); ?>&gt;</td>
            </tr>
            <tr>
                <td>Committer date</td>
                <td><?php echo $page['committer_datetime']; ?></td>
            </tr>
            <tr>
                <td>Committer local date</td>
                <td><?php echo $page['committer_datetime_local']; ?></td>
            </tr>
            <tr>
                <td>Commit</td>
                <td><?php echo $page['commit_id']; ?></td>
            </tr>
            <tr>
                <td>Tree</td>
                <td><a href="<?php echo $git->makelink(
                        array('a' => 'tree', 'p' => $page['project'], 'h' => $page['tree_id'], 'hb' => $page['commit_id'])
                    ); ?>"><?php echo $page['tree_id']; ?></a></td>
            </tr>
            <?php
            foreach ($page['parents'] as $parent) {
                echo "<tr>\n";
                echo "\t<td>Parent</td>\n";
                echo "\t<td><a href=\"" . $git->makelink(
                        array('a' => 'commit', 'p' => $page['project'], 'h' => $parent)
                    ) . "\">$parent</a></td>\n";
                echo "</tr>\n";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <div class="commitmessage">
            <pre><?php echo $git->htmlentities_wrapper($page['message_full']); ?></pre>
        </div>

        <div class="filelist">
            <table id="commit_filelist" class="table table-striped table-bordered" style="width: 100%;">
                <thead>
                <tr>
                    <th colspan="2">Affected files:</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($page['affected_files'] as $details) {
                    echo "<tr><td>";
                    echo "<a href=\"" . $git->makelink(
                            array(
                                'a' => 'viewblob',
                                'p' => $page['project'],
                                'h' => $details['hash'],
                                'hb' => $page['commit_id'],
                                'f' => $details['name']
                            )
                        ) . "\">$details[name]</a>";
                    echo "</td><td></td></tr>";
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
