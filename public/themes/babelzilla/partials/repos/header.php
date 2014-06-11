<?php if (isset($page['project'])) {
    echo "\t<link rel=\"alternate\" type=\"application/rss+xml\" title=\"" . $git->htmlentities_wrapper(
            $page['project']
        ) . " log\" href=\"" . $git->makelink(array('a' => 'rss-log', 'p' => $page['project'])) . "\" />\n";
}
if (isset($page['notices'])) {
?>
<div class="row">
    <div class="large-12 columns">
        <?php
        foreach ($page['notices'] as $n) {
            echo "<div class=\"alert-box $n[class] radius\" style=\"color: black;\">" . $git->htmlentities_wrapper($n['message']) . "</div>";
        }
        echo '</div></div>';
        }
        ?>
        <div class="row">
            <div class="large-12 columns">
                <div id="page_body">
                    <?php if (isset($page['project'])) { ?>

                    <?php
                    $page['links'] = array(
                        'summary' => array(),
                        'shortlog' => array(),
                        'commit' => array('h' => $page['commit_id']),
                        'commitdiff' => array('h' => $page['commit_id']),
                        'tree' => array('h' => $page['tree_id'], 'hb' => $page['commit_id']),
                    );
                    ?>
                    <div class="row">
                        <div class="large-8 columns">
                            <dl class="sub-nav">
                                <?php foreach ($page['links'] as $link => $params) {
                                $class = ($page['action'] === $link) ? "active" : '';
                                ?>
                                <dd class="<?= $class ?>"><a
                                        href="<?= $git->makelink(array_merge(array('a' => $link, 'p' => $page['project']), $params)) ?>"><?= ucfirst($link); ?></a>
                                    <? } ?>
                            </dl>
                        </div>
                        <div class="large-2 columns">
                            <form action="<?= $git->makelink(array('a' => 'search')); ?>" method="get"
                            <input type="hidden" name="h" value="<?php echo $page['commit_id']; ?>"/>
                            <select name="st">
                                <?php
                                $opts = array('commit', 'change', 'author', 'committer');
                                foreach ($opts as $opt) {
                                    echo "\t<option";
                                    if (isset($page['search_t']) && $opt == $page['search_t']) {
                                        echo ' selected="selected"';
                                    }
                                    echo ">$opt</option>\n";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="large-2 columns">
                            <input type="text"
                                   name="s"<?php if (isset($page['search_s'])) {
                                echo ' value="' . $git->htmlentities_wrapper($page['search_s']) . '"';
                            } ?> />
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    </div>
</div>
