<h3>Hi, <?= Auth::user()->username; ?>. Welcome to your dashboard</h3>
<?php
//$projects = Theme::getContentArgument('projects');
echo Theme::partial('dashboard.tabs', array('projects' => $projects,
    'translations' => $translations,
    'repositories' => $repositories,
    'repo_html' => $repo_html,));
?>
 