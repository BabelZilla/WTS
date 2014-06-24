<?php
echo Theme::partial('repos.header', array('git' => $git,
    'page' => $page,
    'project' => $project));
?>
<div class="row">
    <div class="large-12 columns">
        <p><a href="<?php echo $git->makelink(array('a' => 'tags', 'p' => $page['project'])) ?>"><i
                    class="fa fa-tags x2"></i> View all tags</a></p>
    </div>
</div>
<h3>Heads</h3>
<div class="row">
    <div class="large-12 columns">
        <table class="table-bordered" id="heads" style="width: 100%">
            <thead>
            <tr>
                <th class="date">Date</th>
                <th class="branch">Branch</th>
                <th class="actions">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            //    die();
            $tr_class = 'even';
            foreach ($page['heads'] as $h) {
                $tr_class = $tr_class == "odd" ? "even" : "odd";
                echo "<tr class=\"$tr_class\">\n";
                echo "\t<td>$h[date]</td>\n";
                echo "\t<td><a href=\"" . $git->makelink(
                        array('a' => 'shortlog', 'p' => $page['project'], 'h' => $h['fullname'])
                    ) . "\">" . $git->htmlentities_wrapper($h['name']) . "</a></td>\n";
                echo "\t<td></td>\n";
                echo "</tr>\n";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
 