<?php
echo Theme::partial('repos.header', array('git' => $git,
    'page' => $page,
    'project' => $project));
?>
<h3><?php echo $git->htmlentities_wrapper($page['message_firstline']); ?></h3>
<div class="row">
    <div class="large-12 columns">
        <div class="authorinfo">
            <?php
            echo $git->format_author($page['author_name']);
            echo ' [' . $page['author_datetime'] . ']';
            ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <div class="commitmessage">
<pre>
<?php echo $git->htmlentities_wrapper($page['message_full']); ?>
</pre>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <div class="table table-striped table-bordered" style="width: 100%;">
            <table id="filelist">
                <thead>
                <tr>
                    <th>Filename</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // pathname | patch | blob | history
                foreach ($page['files'] as $file => $url) {
                    echo "<tr>\n";
                    echo "<td><a href=\"#$url\">$file</a></td>";
                    echo "</tr>\n";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <div class="diff">
            <pre>
            <?php echo $page['diffdata']; ?>
            </pre>
        </div>
    </div>
</div>
 