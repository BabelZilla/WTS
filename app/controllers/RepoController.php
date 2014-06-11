<?php
use dflydev\markdown\MarkdownParser;

class RepoController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->git = New Githelper();
        $this->theme->asset()->container('footer')->add('dataTables_js', 'themes/babelzilla/assets/js/jquery.dataTables.min.js');
        $this->theme->asset()->container('footer')->add('dataTablesF_js', 'themes/babelzilla/assets/js/dataTables.foundation.js');
    }

    public function index()
    {
        $page['title'] = 'List of projects ';
        foreach (array_keys($this->git->conf['projects']) as $p) {
            $page['projects'][] = $this->git->get_project_info($p);
        }
        //print_r($page); die();
        $view = array(
            'page' => $page,
            'git' => $this->git,
        );
        $this->theme->setTitle($project->name . ' - BabelZilla');
        return $this->theme->of('repo.index', $view)->render();
    }

    public function summary($id)
    {
        $page['action'] = 'summary';
        $project = $this->getProject($id);
        $this->git->setProject($project);
        $page['project'] = $this->git->validate_project(WtsHelper::untrailingslashit($project->name));
        $page['title'] = "$page[project] - Summary";
        $page['subtitle'] = "Summary";

        $info = $this->git->git_get_commit_info($page['project']);
        $page['commit_id'] = $info['h'];
        $page['tree_id'] = $info['tree'];

        $page['shortlog'] = $this->git->handle_shortlog($page['project']);

        $page['tags'] = $this->git->handle_tags($page['project'], $this->git->conf['summary_tags']);
        $page['ref'] = 'HEAD';

        $heads = $this->git->git_get_heads($page['project']);
        $page['heads'] = array();
        foreach ($heads as $h) {
            $info = $this->git->git_get_commit_info($page['project'], $h['h']);
            $page['heads'][] = array(
                'date' => strftime($this->git->conf['datetime'], $info['author_utcstamp']),
                'h' => $h['h'],
                'fullname' => $h['fullname'],
                'name' => $h['name'],
            );
        }
        $view = array(
            'page' => $page,
            'git' => $this->git,
            'project' => $project,
            'action' => $page['action'],
        );
        $this->theme->setTitle($project->name . ' - BabelZilla');
        $this->setCrumbs($project, $page);
        return $this->theme->of('repo.summary', $view)->render();
    }

    public function shortlog($id)
    {
        $page['action'] = 'shortlog';
        $project = $this->getProject($id);
        $this->git->setProject($project);
        $page['project'] = $this->git->validate_project(WtsHelper::untrailingslashit($project->name));
        $page['title'] = "$page[project] - Shortlog";
        $page['subtitle'] = "Shortlog";
        if (isset($_GET['h'])) {
            $page['ref'] = $this->git->validate_hash($_GET['h']);
            if (!$page['ref']) $page['notices'][] = array('class' => 'warning', 'message' => 'Invalid hash detected.');
        } else {
            $page['ref'] = 'HEAD';
        }
        if (isset($_GET['pg'])) {
            $page['pg'] = intval($_GET['pg']);
        } else {
            $page['pg'] = 0;
        }

        $info = $this->git->git_get_commit_info($page['project'], $page['ref']);
        $page['commit_id'] = $info['h'];
        $page['tree_id'] = $info['tree'];

        $page['shortlog'] = $this->git->handle_shortlog($page['project'], $page['ref'], $page['pg']);

        $view = array(
            'page' => $page,
            'git' => $this->git,
            'project' => $project,
            'action' => $page['action'],
        );
        $this->theme->setTitle($project->name . ' - BabelZilla');
        $this->setCrumbs($project, $page);
        return $this->theme->of('repo.shortlog', $view)->render();
    }

    public function tags($id)
    {
        $page['action'] = 'tags';
        $project = $this->getProject($id);
        $this->git->setProject($project);
        $page['project'] = $this->git->validate_project(WtsHelper::untrailingslashit($project->name));
        $page['title'] = "$page[project] - Tags";

        $info = $this->git->git_get_commit_info($page['project']);
        $page['commit_id'] = $info['h'];
        $page['tree_id'] = $info['tree'];
        $page['tags'] = $this->git->handle_tags($page['project']);

        $view = array(
            'page' => $page,
            'git' => $this->git,
            'project' => $project,
            'action' => $page['action'],
        );
        $this->theme->setTitle($project->name . ' - BabelZilla');
        $this->setCrumbs($project, $page);
        return $this->theme->of('repo.tags', $view)->render();
    }

    public function viewblob($id)
    {
        $page['action'] = 'viewblob';
        $project = $this->getProject($id);
        $this->git->setProject($project);
        $page['project'] = $this->git->validate_project(WtsHelper::untrailingslashit($project->name));
        $page['hash'] = $this->git->validate_hash($_GET['h']);

        $page['title'] = "$page[project] - Blob";
        if (isset($_GET['hb'])) {
            $page['commit_id'] = $this->git->validate_hash($_GET['hb']);
            if (!$page['commit_id']) $page['notices'][] = array('class' => 'warning', 'message' => 'Invalid hash detected.');
        } else {
            $page['commit_id'] = 'HEAD';
        }
        $page['subtitle'] = "Blob " . substr($page['hash'], 0, 6);

        $page['path'] = '';
        if (isset($_GET['f'])) {
            $page['path'] = $_GET['f']; // TODO validate?
        }

        // For the header's pagenav
        $info = $this->git->git_get_commit_info($page['project'], $page['commit_id']);
        $page['commit_id'] = $info['h'];
        $page['tree_id'] = $info['tree'];

        $page['pathinfo'] = $this->git->git_get_path_info($page['project'], $page['commit_id'], $page['path']);

        $page['data'] = $this->git->fix_encoding(
            join("\n", $this->git->run_git($page['project'], "cat-file blob $page[hash]"))
        );

        $page['lastlog'] = $this->git->git_get_commit_info($page['project'], 'HEAD', $page['path']);
        //print_r($page['path']);
        $parts = explode('.', $page['path']);
        $ext = array_pop($parts);
        $images = array('png', 'jpg', 'jpeg', 'gif');
        if (in_array($ext, $images)) {
            $args['base64'] = base64_encode($page['data']);
            //header("Content-type: image/$ext");
            //echo '<img src="data:image/' . $ext . ';base64,' . base64_encode($page['data']) . '"';
            //echo '<img src="data:image/'.$ext.';base64,'.$args['base64'].'"/>';
        }
        if ($ext === 'md') {
            //$markdown = new CMarkdown;

            $markdown = new MarkdownParser();
            $page['html_data'] = $markdown->transform($page['data']);
        } else {
            // GeSHi support
            if ($this->git->conf['geshi'] && strpos($page['path'], '.')) {
                $old_mask = error_reporting(E_ALL ^ E_NOTICE);
                //require_once($this->git->conf['geshi_path']);
                $geshi = new GeSHi($page['data']);
                $geshi->set_header_type(GESHI_HEADER_DIV);
                $lang = $geshi->get_language_name_from_extension($ext);
                if (strlen($lang) > 0) {
                    $geshi->set_language($lang);
                    if (is_int($this->git->conf['geshi_line_numbers'])) {
                        if ($this->git->conf['geshi_line_numbers'] == 0) {
                            $geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
                        } else {
                            $geshi->enable_line_numbers(
                                GESHI_FANCY_LINE_NUMBERS,
                                $this->git->conf['geshi_line_numbers']
                            );
                        }
                    }
                    $page['html_data'] = $geshi->parse_code();
                }
                error_reporting($old_mask);
            }
        }

        $view = array(
            'page' => $page,
            'git' => $this->git,
            'project' => $project,
            'action' => $page['action'],
        );
        $this->theme->setTitle($project->name . ' - BabelZilla');
        $this->setCrumbs($project, $page);
        return $this->theme->of('repo.blob', $view)->render();
    }

    public function commit($id)
    {
        $page['action'] = 'commit';
        $project = $this->getProject($id);
        $this->git->setProject($project);
        $page['project'] = $this->git->validate_project(WtsHelper::untrailingslashit($project->name));
        $page['title'] = "$page[project] - Tags";
        $page['commit_id'] = $this->git->validate_hash($_GET['h']);
        if (!$page['commit_id']) $page['notices'][] = array('class' => 'warning', 'message' => 'Invalid hash detected.');

        $page['subtitle'] = "Commit " . substr($page['commit_id'], 0, 6);

        $info = $this->git->git_get_commit_info($page['project'], $page['commit_id']);

        $page['author_name'] = $info['author_name'];
        $page['author_mail'] = $info['author_mail'];
        $page['author_datetime'] = $info['author_datetime'];
        $page['author_datetime_local'] = $info['author_datetime_local'];
        $page['committer_name'] = $info['committer_name'];
        $page['committer_mail'] = $info['committer_mail'];
        $page['committer_datetime'] = $info['committer_datetime'];
        $page['committer_datetime_local'] = $info['committer_datetime_local'];
        $page['tree_id'] = $info['tree'];
        $page['parents'] = $info['parents'];
        $page['message'] = $info['message'];
        $page['message_firstline'] = $info['message_firstline'];
        $page['message_full'] = $info['message_full'];
        $page['affected_files'] = $this->git->git_get_changed_paths($page['project'], $page['commit_id']);

        $view = array(
            'page' => $page,
            'git' => $this->git,
            'project' => $project,
            'action' => $page['action'],
        );
        $this->theme->setTitle($project->name . ' - BabelZilla');
        $this->setCrumbs($project, $page);
        return $this->theme->of('repo.commit', $view)->render();
    }

    public function tree($id)
    {
        $page['action'] = 'tree';
        $project = $this->getProject($id);
        $this->git->setProject($project);
        $page['project'] = $this->git->validate_project(WtsHelper::untrailingslashit($project->name));
        if (isset($_GET['h'])) {
            $page['tree_id'] = $this->git->validate_hash($_GET['h']);
            if (!$page['tree_id']) $page['notices'][] = array('class' => 'warning', 'message' => 'Invalid hash detected.');
        }
        /*
        else {
            // TODO walk the tree
            $page['tree_id'] = 'HEAD';
        }
        */
        $page['title'] = "$page[project] - Tree";

        // 'hb' optionally contains the commit_id this tree is related to
        if (isset($_GET['hb'])) {
            $page['commit_id'] = $this->git->validate_hash($_GET['hb']);
            if (!$page['commit_id']) $page['notices'][] = array('class' => 'warning', 'message' => 'Invalid hash detected.');
        } else {
            // for the header
            $info = $this->git->git_get_commit_info($page['project']);
            $page['commit_id'] = $info['h'];
        }

        $page['path'] = '';
        if (isset($_GET['f'])) {
            $page['path'] = $_GET['f']; // TODO validate?
        }

        // get path info for the header
        $page['pathinfo'] = $this->git->git_get_path_info($page['project'], $page['commit_id'], $page['path']);
        if (!isset($page['tree_id'])) {
            // Take the last hash from the tree
            if (count($page['pathinfo']) > 0) {
                $page['tree_id'] = $page['pathinfo'][count($page['pathinfo']) - 1]['hash'];
            } else {
                $page['tree_id'] = 'HEAD';
            }
        }

        $page['subtitle'] = "Tree " . substr($page['tree_id'], 0, 6);
        $page['entries'] = $this->git->git_ls_tree($page['project'], $page['tree_id']);

        $view = array(
            'page' => $page,
            'git' => $this->git,
            'project' => $project,
            'action' => $page['action'],
        );
        $this->theme->setTitle($project->name . ' - BabelZilla');
        $this->setCrumbs($project, $page);
        return $this->theme->of('repo.tree', $view)->render();
    }

    public function blob($id)
    {
        $project = $this->getProject($id);
        $this->git->setProject($project);
        $page['project'] = $this->git->validate_project(WtsHelper::untrailingslashit($project->name));
        $hash = $this->git->validate_hash($_GET['h']);
        if (!$hash) $page['notices'][] = array('class' => 'warning', 'message' => 'Invalid hash detected.');
        $name = $_GET['n'];
        header('Content-type: application/octet-stream');
        header("Content-Disposition: attachment; filename=$name"); // FIXME needs quotation
        $result = $this->git->run_git_passthru($page['project'], "cat-file blob $hash");
        echo $result;
    }

    public function search($id)
    {
        $page['action'] = 'search';
        $project = $this->getProject($id);
        $this->git->setProject($project);
        $page['project'] = $this->git->validate_project(WtsHelper::untrailingslashit($project->name));
        $info = $this->git->git_get_commit_info($page['project']);
        $page['commit_id'] = $info['h'];
        $page['tree_id'] = $info['tree'];

        $branch = $this->git->validate_hash($_GET['h']);
        if (!$branch) $page['notices'][] = array('class' => 'warning', 'message' => 'Invalid hash detected.');
        $type = $_GET['st'];
        $string = $_GET['s'];

        $page['search_t'] = $type;
        $page['search_s'] = $string;

        $commits = $this->git->git_search_commits($page['project'], $branch, $type, $string);
        $shortlog = array();

        foreach ($commits as $c) {
            $info = $this->git->git_get_commit_info($page['project'], $c);
            $shortlog[] = array(
                'author' => $info['author_name'],
                'date' => strftime($this->git->conf['datetime'], $info['author_utcstamp']),
                'message' => $info['message'],
                'commit_id' => $info['h'],
                'tree' => $info['tree'],
                'refs' => array(),
            );
        }
        $page['shortlog_no_more'] = true;
        $page['shortlog'] = $shortlog;
        $view = array(
            'page' => $page,
            'git' => $this->git,
            'project' => $project,
            'action' => $page['action'],
        );
        $this->theme->setTitle($project->name . ' - BabelZilla');
        $this->setCrumbs($project, $page);
        return $this->theme->of('repo.shortlog', $view)->render();
    }

    public function commitdiff($id)
    {
        $page['action'] = 'commitdiff';
        $project = $this->getProject($id);
        $this->git->setProject($project);
        $page['project'] = $this->git->validate_project(WtsHelper::untrailingslashit($project->name));
        $page['title'] = "$page[project] - Commitdiff";
        $hash = $this->git->validate_hash($_GET['h']);
        if (!$hash) $page['notices'][] = array('class' => 'warning', 'message' => 'Invalid hash detected.');
        $page['commit_id'] = $hash;
        $page['subtitle'] = "Commitdiff " . substr($page['commit_id'], 0, 6);

        $info = $this->git->git_get_commit_info($page['project'], $hash);

        $page['tree_id'] = $info['tree'];

        $page['message'] = $info['message'];
        $page['message_firstline'] = $info['message_firstline'];
        $page['message_full'] = $info['message_full'];
        $page['author_name'] = $info['author_name'];
        $page['author_mail'] = $info['author_mail'];
        $page['author_datetime'] = $info['author_datetime'];

        $text = $this->git->fix_encoding($this->git->git_diff($page['project'], "$hash^", $hash));
        list($page['files'], $page['diffdata']) = $this->git->format_diff($text);
        $view = array(
            'page' => $page,
            'git' => $this->git,
            'project' => $project,
            'action' => $page['action'],
        );
        $this->theme->setTitle($project->name . ' - BabelZilla');
        $this->setCrumbs($project, $page);
        return $this->theme->of('repo.commitdiff', $view)->render();
    }

    public function archive($id)
    {
        $project = $this->getProject($id);
        $this->git->setProject($project);
        $page['project'] = $this->git->validate_project(WtsHelper::untrailingslashit($project->name));
        $info = $this->git->get_project_info($project);
        $tree = $this->git->validate_hash($_GET['h']);
        if (!$tree) $page['notices'][] = array('class' => 'warning', 'message' => 'Invalid hash detected.');
        $type = $_GET['t'];
        if (isset($_GET['hb'])) {
            $hb = $this->git->validate_hash($_GET['hb']);
            if (!$hb) $page['notices'][] = array('class' => 'warning', 'message' => 'Invalid hash detected.');
            $describe = $this->git->git_describe($project, $hb);
        }

        // Archive prefix
        $archive_prefix = '';
        if (isset($info['archive_prefix'])) {
            $archive_prefix = "{$info['archive_prefix']}";
        } elseif (isset($this->git->conf['archive_prefix'])) {
            $archive_prefix = "{$this->git->conf['archive_prefix']}";
        }
        $archive_prefix = str_replace(array('{PROJECT}', '{DESCRIBE}'), array($project, $describe), $archive_prefix);

        // Basename
        $basename = $page['project'] . "-tree-" . substr($tree, 0, 7);
        //$basename = $archive_prefix;
        if (isset($_GET['n'])) {
            $basename = "$basename-$_GET[n]-" . substr($tree, 0, 6);
        }

        $prefix_option = '';
        if (isset($archive_prefix)) {
            $prefix_option = "--prefix={$archive_prefix}/";
        }

        if ($type === 'targz') {
            header("Content-Type: application/x-tar-gz");
            header("Content-Transfer-Encoding: binary");
            header("Content-Disposition: attachment; filename=\"$basename.tar.gz\";");
            $this->git->run_git_passthru($page['project'], "archive --format=tar $prefix_option $tree |gzip");
        } elseif ($type === 'zip') {
            header("Content-Type: application/x-zip");
            header("Content-Transfer-Encoding: binary");
            header("Content-Disposition: attachment; filename=\"$basename.zip\";");
            $this->git->run_git_passthru($page['project'], "archive --format=zip $prefix_option $tree");
        } else {
            die('Invalid archive type requested');
        }
    }

    public function patch($id)
    {
        $project = $this->getProject($id);
        $this->git->setProject($project);
        $page['project'] = $this->git->validate_project(WtsHelper::untrailingslashit($project->name));
        $hash = $this->git->validate_hash($_GET['h']);
        if (!$hash) $page['notices'][] = array('class' => 'warning', 'message' => 'Invalid hash detected.');
        $filename = $page['project'] . "-" . substr($hash, 0, 7) . ".patch";
        //Yii::app()->getRequest()->sendFile( $filename , $this->run_git_passthru($page['project'], "format-patch --stdout $hash^..$hash") );
        //Yii::app()->end();
        //header("Content-Type: text/x-diff");
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: binary");
        // TODO git-style filename
        header("Content-Disposition: attachment; filename=\"$filename\";");

        $this->git->run_git_passthru($page['project'], "format-patch --stdout $hash^..$hash");
    }

    public function gcomments($id, $cid)
    {
        $project = $this->getProject($id);
        $client = new \Github\Client(
            new \Github\HttpClient\CachedHttpClient(array('cache_dir' => '../github-api-cache'))
        );
        $issueDetails = $client->api('issue')->show('TheoChevalier', 'FoxShop', $cid);
        $comments = $client->api('issue')->comments()->all('TheoChevalier', 'FoxShop', $cid);

        $view = array(
            'details' => $issueDetails,
            'comments' => $comments,
            'project' => $project,
        );
        $add[] = array(
            'label' => 'Issues',
            'url' => route('repoissues', array('id' => $project->project_id))
        );
        $add[] = array(
            'label' => 'Comment #' . $cid,
            'url' => route('repocomments', array('id' => $project->project_id,
                'cid' => $cid))
        );
        $this->theme->setTitle($project->name . ' - BabelZilla');
        $this->setCrumbs($project, false, $add);
        return $this->theme->of('repo.comments', $view)->render();
    }

    public function gissues($id)
    {
        $client = new \Github\Client(
            new \Github\HttpClient\CachedHttpClient(array('cache_dir' => '../github-api-cache'))
        );
        $project = $this->getProject($id);

        $issues = $client->api('issue')->all('TheoChevalier', 'FoxShop', array('state' => 'open', 'per_page' => 100));
        $issuesClosed = $client->api('issue')->all('TheoChevalier', 'FoxShop', array('state' => 'closed', 'per_page' => 100));
        $labels = $client->api('issue')->labels()->all('TheoChevalier', 'FoxShop');
        //print_r($labels);
        $issueDetails = $client->api('issue')->show('TheoChevalier', 'FoxShop', 55);
        $comments = $client->api('issue')->comments()->all('TheoChevalier', 'FoxShop', 55);
        foreach ($labels as $label) {
            foreach ($issues as $issue) {
                foreach ($issue['labels'] as $ilabel) {
                    //echo $ilabel['name']."<br/>";
                    if ($ilabel['name'] == $label['name']) {
                        ${$label['name']}++;
                    }
                }
            }
        }
        foreach ($labels as $label) {
            $label['count'] = ${$label['name']};
            $advLabels[] = $label;
        }
        //unset($labels);
        $labelsOpen = $advLabels;
        foreach ($labels as $label) {
            unset (${$label['name']});
        }
        foreach ($labels as $label) {
            foreach ($issuesClosed as $issue) {
                foreach ($issue['labels'] as $ilabel) {
                    //echo $ilabel['name']."<br/>";
                    if ($ilabel['name'] == $label['name']) {
                        ${$label['name']}++;
                    }
                }
            }
        }
        unset ($advLabels);
        foreach ($labels as $label) {
            $label['count'] = ${$label['name']};
            $advLabels[] = $label;
        }
        $labelsClosed = $advLabels;
        $view = array(
            'issues' => $issues,
            'issuesClosed' => $issuesClosed,
            'labelsOpen' => $labelsOpen,
            'labelsClosed' => $labelsClosed,
            'details' => $issueDetails,
            'comments' => $comments,
            'project' => $project,
        ); //58
        $add[] = array(
            'label' => 'Issues',
            'url' => route('repoissues', array('id' => $project->project_id))
        );
        $this->theme->setTitle($project->name . ' - BabelZilla');
        $this->setCrumbs($project, false, $add);
        return $this->theme->of('repo.issues', $view)->render();
    }

    private function setCrumbs($project, $page = false, $additional = false)
    {
        $links[] = array(
            'label' => 'Home',
            'url' => '/'
        );
        $links[] = array(
            'label' => 'Projects',
            'url' => route('projectlist'),
        );
        $links[] = array(
            'label' => $project->name,
            'url' => route('project', array(
                'project' => $project->slug,
            )),
        );
        if ($additional) {
            $links = array_merge($links, $additional);
        }
        if (isset($page['project'])) {
            $links[] = array('label' => $page[project],
                'url' => $this->git->makelink(array('a' => 'summary', 'p' => $page['project'])),
                'class' => 'repolink');
        }

        // If we have a path inside the repo, add to breadcrumb
        if (isset($page['path'])) {
            if (isset($page['pathinfo'])) {
                $f = '';
                foreach ($page['pathinfo'] as $p) {
                    if (strlen($f) > 0) {
                        $f .= '/';
                    }
                    $f .= "$p[name]";
                    $links[] = array(
                        'label' => $p[name],
                        'url' => $this->git->makelink(
                                array(
                                    'a' => ($p['type'] === 'tree' ? 'tree' : 'viewblob'),
                                    'p' => $page['project'],
                                    'h' => $p['hash'],
                                    'hb' => $page['commit_id'],
                                    'f' => $f
                                )
                            ),
                        'class' => 'repolink'
                    );
                }
            }
        }
        if ($page['subtitle']) {
            $linkcnt = count($links);
            $links[$linkcnt - 1]['label'] = $links[$linkcnt - 1]['label'] . ' => ' . $page['subtitle'];
        }
        $this->theme->breadcrumb()->add($links);
    }
}