<?php
echo Theme::partial('repos.header', array('git' => $git,
    'page' => $page,
    'project' => $project));
?>
<div class="row">
    <div class="large-12 columns">
        <h4>Last commit for <?php echo $git->htmlentities_wrapper($page['path']); ?>: <a
                href="<?php echo $git->makelink(
                    array('a' => 'commit', 'p' => $page['project'], 'h' => $page['lastlog']['h'])
                ); ?>"><?php echo $git->htmlentities_wrapper($page['lastlog']['h']); ?></a></h4>

        <h3><?php echo $git->htmlentities_wrapper($page['lastlog']['message_firstline']); ?></h3>
    </div>
</div>

<div class="authorinfo">
    <?php
    echo $git->format_author($page['lastlog']['author_name']);
    echo ' [' . $page['lastlog']['author_datetime'] . ']';
    ?>
</div>
<div class="commitmessage">
<pre>
<?php echo $git->htmlentities_wrapper($page['lastlog']['message_full']); ?>
</pre>
</div>
<div class="file">
    <?php
    if (isset($page['html_data'])) {
        echo $page['html_data'];
    }
    else {
    ?>
    <pre>
<?php echo htmlspecialchars($page['data']); ?>
</pre>
</div>
<?php
}
?>

 