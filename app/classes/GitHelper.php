<?php

class Githelper
{
    public $conf;
    public $repoPath;
    public $project;

    function __construct()
    {
        //error_reporting(E_ALL | E_STRICT);
        error_reporting(1);
        ini_set('display_errors', 1);
        require_once('Repository.php');
        $user_id = Auth::user()->id;
        $this->repoPath = Config::Get('wts.repoFolder') . $user_id;
        $list = Utils::SearchDirectoryByName($this->repoPath, '.git');
        foreach ($list as $repo) {
            $this->conf['projects'][basename(dirname($repo))][repo] = $repo;
        }
        // Where git is. Default is to search from PATH, but you can use an absolute
        // path as well.
        $this->conf['git'] = '/usr/bin/git';

        // If set, contains an array of globs/wildcards where to include projects.
        // Use this if you have a lot of projects under a directory.
        //$this->conf['projects_glob'] = array('');

        // If set, contains an array of projects to exclude.
        // Use this if you have set $this->conf['projects_glob'] and you
        // want to exclude just some projects.
        //$this->conf['projects_exclude'] = array('project1', 'project2');

        // Name and prefix for tar/gz & zip archives generated. Default is to use the
        // project name and version. Can be overridden in project config.
        $this->conf['archive_prefix'] = '{PROJECT}-{DESCRIBE}';

        $this->conf['datetime'] = '%Y-%m-%d %H:%M';

        // More complete format for commit page
        $this->conf['datetime_full'] = '%Y-%m-%d %H:%M:%S';

        // Set timezone to format timestamps for. If you have a local one-site team,
        // you may want to override this with your local timezone.
        // See http://www.php.net/manual/en/timezones.php for supported values.
        $this->conf['timezone'] = 'UTC';

        // Maximum length of commit message's first line to show
        $this->conf['commit_message_maxlen'] = 50;

        // Maximum number of shortlog entries to show on the summary page
        $this->conf['summary_shortlog'] = 15;

        // Maximum number of tags to show on the summary page
        $this->conf['summary_tags'] = 10;

        // Whether to show remote labels on shortlog
        $this->conf['shortlog_remote_labels'] = true;

        // Allow checking out projects via "git clone"
        $this->conf['allow_checkout'] = true;

        // If set, this function is used to obfuscate e-mail addresses of authors/committers
        // The 'obfuscate_mail' function simply replaces @ with ' at ' and . with ' dot '
        //$this->conf['mail_filter'] = 'obfuscate_mail';
        //$this->conf['mail_filter'] = create_function('$mail', 'return str_rot13(strtoupper($mail));');

        // Whether to use GeSHi for source highlighting
        $this->conf['geshi'] = true;

        // Path to geshi.php
        $this->conf['geshi_path'] = 'protected/vendors/geshi/geshi.php';
        //$this->conf['geshi_path'] = '/usr/share/php-geshi/geshi.php'; // Path on Debian

        // Use line numbers in geshi?
        // Setting this to "false" disables line numbers
        // Using a value of 0 will enable "NORMAL" geshi line numbers
        // Using values of 1 or more will enable "FANCY" geshi line numbers
        $this->conf['geshi_line_numbers'] = 0;

        // RSS time to live (how often clients should update the feed), in minutes.
        $this->conf['rss_ttl'] = 10;

        // RSS: Maximum number of items in feed
        $this->conf['rss_max_items'] = 30;

        // RSS item format. Allowed formatting:
        // {AUTHOR}, {AUTHOR_MAIL}, {SHORTLOG}, {LOG}, {COMMITTER}, {COMMITTER_MAIL}, {DIFFSTAT}
        $this->conf['rss_item_title'] = '{SHORTLOG} ({AUTHOR})';
        $this->conf['rss_item_description'] = '<pre>{LOG}</pre><b>{AUTHOR}</b> &lt;{AUTHOR_MAIL}&gt;<br /><pre>{DIFFSTAT}</pre>';

        $this->conf['debug'] = false;
        $this->conf['debug_command_trace'] = false;

        // Includes a small link to the ViewGit homepage on each page
        $this->conf['ad'] = true;

        // If auth_lib is set, inc/auth_<auth_lib>.php must exist and include a function
        // named auth_check(). The function should check any required global variables
        // (such as $_REQUEST, $_SERVER['PHP_AUTH_USER']) and die() if access is denied.

        // For a simple username/password authorisation you can use auth_simple, see
        // inc/auth_simple.php for more info. The array is username => md5 hash.
        //$this->conf['auth_lib'] = 'simple';
        //$this->conf['auth_simple_users'] = array('test' => 'd7b58f27f98f47bacd60fa87efe822ba');

        // Uncomment the following lines to authenticate using some drupal site's
        // config
        //$this->conf['auth_lib'] = 'drupal_user';
        //$this->conf['drupal_site_config'] = '/var/www/sites/default/settings.php';

        // Which stylesheet to use
        $this->conf['style'] = 'default';
    }

    function setProject($project)
    {
        $this->project = $project;
    }

    /** @file
     * Functions used by ViewGit.
     */

    function debug($msg)
    {
        global $conf;

        if ($this->conf['debug']) {
            file_put_contents(
                'php://stderr',
                strftime('%H:%M:%S') . " viewgit: $_SERVER[REMOTE_ADDR]:$_SERVER[REMOTE_PORT] $msg\n",
                FILE_APPEND
            );
        }
    }

    function fix_encoding($in_str)
    {
        if (function_exists("mb_detect_encoding") && function_exists("mb_check_encoding")) {
            $cur_encoding = mb_detect_encoding($in_str);
            if ($cur_encoding == "UTF-8" && mb_check_encoding($in_str, "UTF-8")) {
                return $in_str;
            } else {
                return utf8_encode($in_str);
            }
        } else {
            return utf8_encode($in_str);
        }
    }

    /**
     * Format author's name & wrap it to links etc.
     */
    function format_author($author)
    {
        global $page;

        if ($this->project) {
            // FIXME 'h' - use only if available
            return '<a href="' . $this->makelink(
                array('a' => 'search', 'p' => $page['project'], 'h' => 'HEAD', 'st' => 'author', 's' => $author)
            ) . '">' . $this->htmlentities_wrapper($author) . '</a>';
        } else {
            return $this->htmlentities_wrapper($author);
        }
    }

    /**
     * Formats "git diff" output into xhtml.
     * @return array(array of filenames, xhtml)
     */
    function format_diff($text)
    {
        $files = array();

        // match every "^diff --git a/<path> b/<path>$" line
        foreach (explode("\n", $text) as $line) {
            if (preg_match('#^diff --git a/(.*) b/(.*)$#', $line, $matches) > 0) {
                $files[$matches[1]] = urlencode($matches[1]);
            }
        }

        $text = $this->htmlentities_wrapper($text);

        $text = preg_replace(
            array(
                '/^(\+.*)$/m',
                '/^(-.*)$/m',
                '/^(@.*)$/m',
                '/^([^d\+-@].*)$/m',
            ),
            array(
                '<span class="add">$1</span>',
                '<span class="del">$1</span>',
                '<span class="pos">$1</span>',
                '<span class="etc">$1</span>',
            ),
            $text
        );
        $text = preg_replace_callback(
            '#^diff --git a/(.*) b/(.*)$#m',
            create_function(
                '$m',
                'return "<span class=\"diffline\"><a name=\"". urlencode($m[1]) ."\">diff --git a/$m[1] b/$m[2]</a></span>";'
            ),
            $text
        );

        return array($files, $text);
    }

    /**
     * Get project information from config and git, name/description and HEAD
     * commit info are returned in an array.
     */
    function get_project_info($name)
    {
        global $conf;

        $info = $this->conf['projects'][$name];
        $info['name'] = $name;

        // If description is not set, read it from the repository's description
        if (!isset($info['description'])) {
            $info['description'] = @file_get_contents($info['repo'] . '/description');
        }

        $headinfo = $this->git_get_commit_info($name, 'HEAD');
        $info['head_stamp'] = $headinfo['author_utcstamp'];
        $info['head_datetime'] = strftime($this->conf['datetime'], $headinfo['author_utcstamp']);
        $info['head_hash'] = $headinfo['h'];
        $info['head_tree'] = $headinfo['tree'];
        $info['message'] = $headinfo['message'];

        return $info;
    }

    function git_describe($project, $commit)
    {
        $output = $this->run_git($project, "describe --always " . escapeshellarg($commit));
        return $output[0];
    }

    /**
     * Get diff between given revisions as text.
     */
    function git_diff($project, $from, $to)
    {
        return join("\n", $this->run_git($project, "diff \"$from..$to\""));
    }

    function git_diffstat($project, $commit, $commit_base = null)
    {
        if (is_null($commit_base)) {
            $commit_base = "$commit^";
        }
        return join("\n", $this->run_git($project, "diff --stat $commit_base..$commit"));
    }

    /**
     * Get array of changed paths for a commit.
     */
    function git_get_changed_paths($project, $hash = 'HEAD')
    {
        $result = array();
        $affected_files = $this->run_git($project, "show --pretty=\"format:\" --name-only $hash");
        foreach ($affected_files as $file) {
            // The format above contains a blank line; Skip it.
            if ($file == '') {
                continue;
            }

            $output = $this->run_git($project, "ls-tree $hash $file");
            foreach ($output as $line) {
                $parts = preg_split('/\s+/', $line, 4);
                $result[] = array('name' => $parts[3], 'hash' => $parts[2]);
            }
        }
        return $result;
    }

    /**
     * Get details of a commit: tree, parents, author/committer (name, mail, date), message
     */
    function git_get_commit_info($project, $hash = 'HEAD', $path = null)
    {
        global $conf;

        $info = array();
        $info['h_name'] = $hash;
        $info['message_full'] = '';
        $info['parents'] = array();

        $extra = '';
        if (isset($path)) {
            $extra = '-- ' . escapeshellarg($path);
        }

        $output = $this->run_git($project, "rev-list --header --max-count=1 $hash $extra");
        // tree <h>
        // parent <h>
        // author <name> "<"<mail>">" <stamp> <timezone>
        // committer
        // <empty>
        //     <message>
        $pattern = '/^(author|committer) ([^<]+) <([^>]*)> ([0-9]+) (.*)$/';
        foreach ($output as $line) {
            if (substr($line, 0, 4) === 'tree') {
                $info['tree'] = substr($line, 5);
            } // may be repeated multiple times for merge/octopus
            elseif (substr($line, 0, 6) === 'parent') {
                $info['parents'][] = substr($line, 7);
            } elseif (preg_match($pattern, $line, $matches) > 0) {
                $info[$matches[1] . '_name'] = $matches[2];
                $info[$matches[1] . '_mail'] = $matches[3];
                $info[$matches[1] . '_stamp'] = $matches[4] + ((intval($matches[5]) / 100.0) * 3600);
                $info[$matches[1] . '_timezone'] = $matches[5];
                $info[$matches[1] . '_utcstamp'] = $matches[4];

                if (isset($this->conf['mail_filter'])) {
                    $info[$matches[1] . '_mail'] = $this->conf['mail_filter']($info[$matches[1] . '_mail']);
                }
            } // Lines starting with four spaces and empty lines after first such line are part of commit message
            elseif (substr($line, 0, 4) === '    ' || (strlen($line) == 0 && isset($info['message']))) {
                $info['message_full'] .= substr($line, 4) . "\n";
                if (!isset($info['message'])) {
                    $info['message'] = substr($line, 4, $this->conf['commit_message_maxlen']);
                    $info['message_firstline'] = substr($line, 4);
                }
            } elseif (preg_match('/^[0-9a-f]{40}$/', $line) > 0) {
                $info['h'] = $line;
            }
        }

        // This is a workaround for the unlikely situation where a commit does
        // not have a message. Such a commit can be created with the following
        // command:
        // git commit --allow-empty -m '' --cleanup=verbatim
        if (!array_key_exists('message', $info)) {
            $info['message'] = '(no message)';
            $info['message_firstline'] = '(no message)';
        }

        $info['author_datetime'] = strftime($this->conf['datetime_full'], $info['author_utcstamp']);
        $info['author_datetime_local'] = strftime(
                $this->conf['datetime_full'],
                $info['author_stamp']
            ) . ' ' . $info['author_timezone'];
        $info['committer_datetime'] = strftime($this->conf['datetime_full'], $info['committer_utcstamp']);
        $info['committer_datetime_local'] = strftime(
                $this->conf['datetime_full'],
                $info['committer_stamp']
            ) . ' ' . $info['committer_timezone'];

        return $info;
    }

    /**
     * Get list of heads (branches) for a project.
     */
    function git_get_heads($project)
    {
        $heads = array();

        $output = $this->run_git($project, 'show-ref --heads');
        foreach ($output as $line) {
            $fullname = substr($line, 41);
            $tmp = explode('/', $fullname);
            $name = array_pop($tmp);
            $pre = array_pop($tmp);
            if ($pre != 'heads') {
                $name = $pre . '/' . $name;
            }
            $heads[] = array('h' => substr($line, 0, 40), 'fullname' => "$fullname", 'name' => "$name");
        }

        return $heads;
    }

    /**
     * Get array containing path information for parts, starting from root_hash.
     *
     * @param root_hash commit/tree hash for the root tree
     * @param path path
     */
    function git_get_path_info($project, $root_hash, $path)
    {
        if (strlen($path) > 0) {
            $parts = explode('/', $path);
        } else {
            $parts = array();
        }

        $pathinfo = array();

        $tid = $root_hash;
        $pathinfo = array();
        foreach ($parts as $p) {
            $entry = $this->git_ls_tree_part($project, $tid, $p);
            if (is_null($entry)) {
                die('Invalid path info.');
            }
            $pathinfo[] = $entry;
            $tid = $entry['hash'];
        }

        return $pathinfo;
    }

    /**
     * Get revision list starting from given commit.
     * @param skip how many hashes to skip from the beginning
     * @param max_count number of commit hashes to return, or all if not given
     * @param start revision to start from, or HEAD if not given
     */
    function git_get_rev_list($project, $skip = 0, $max_count = null, $start = 'HEAD')
    {
        $cmd = "rev-list ";
        if ($skip != 0) {
            $cmd .= "--skip=$skip ";
        }
        if (!is_null($max_count)) {
            $cmd .= "--max-count=$max_count ";
        }
        $cmd .= $start;

        return $this->run_git($project, $cmd);
    }

    /**
     * Get list of tags for a project.
     */
    function git_get_tags($project)
    {
        $tags = array();

        $output = $this->run_git($project, 'show-ref --tags');
        foreach ($output as $line) {
            $fullname = substr($line, 41);
            $tmp = explode('/', $fullname);
            $name = array_pop($tmp);
            $tags[] = array('h' => substr($line, 0, 40), 'fullname' => $fullname, 'name' => $name);
        }
        return $tags;
    }

    /**
     * Get information about objects in a tree.
     * @param tree tree or commit hash
     * @return list of arrays containing name, mode, type, hash
     */
    function git_ls_tree($project, $tree)
    {
        $entries = array();
        $output = $this->run_git($project, "ls-tree $tree");
        // 100644 blob 493b7fc4296d64af45dac64bceac2d9a96c958c1    .gitignore
        // 040000 tree 715c78b1011dc58106da2a1af2fe0aa4c829542f    doc
        foreach ($output as $line) {
            $parts = preg_split('/\s+/', $line, 4);
            $entries[] = array('name' => $parts[3], 'mode' => $parts[0], 'type' => $parts[1], 'hash' => $parts[2]);
        }

        return $entries;
    }

    /**
     * Get information about the given object in a tree, or null if not in the tree.
     */
    function git_ls_tree_part($project, $tree, $name)
    {
        $entries = $this->git_ls_tree($project, $tree);
        foreach ($entries as $entry) {
            if ($entry['name'] === $name) {
                return $entry;
            }
        }
        return null;
    }

    /**
     * Get the ref list as dict: hash -> list of names.
     * @param tags whether to show tags
     * @param heads whether to show heads
     * @param remotes whether to show remote heads, currently implies tags and heads too.
     */
    function git_ref_list($project, $tags = true, $heads = true, $remotes = true)
    {
        $cmd = "show-ref --dereference";
        if (!$remotes) {
            if ($tags) {
                $cmd .= " --tags";
            }
            if ($heads) {
                $cmd .= " --heads";
            }
        }

        $result = array();
        $output = $this->run_git($project, $cmd);
        foreach ($output as $line) {
            // <hash> <ref>
            $parts = explode(' ', $line, 2);
            $name = str_replace(array('refs/', '^{}'), array('', ''), $parts[1]);
            $result[$parts[0]][] = $name;
        }
        return $result;
    }

    /**
     * Find commits based on search type and string.
     */
    function git_search_commits($project, $branch, $type, $string)
    {
        // git log -sFOO
        if ($type == 'change') {
            $cmd = 'log -S' . escapeshellarg($string);
        } elseif ($type == 'commit') {
            $cmd = 'log -i --grep=' . escapeshellarg($string);
        } elseif ($type == 'author') {
            $cmd = 'log -i --author=' . escapeshellarg($string);
        } elseif ($type == 'committer') {
            $cmd = 'log -i --committer=' . escapeshellarg($string);
        } else {
            die('Unsupported type');
        }
        $cmd .= ' ' . $branch;
        $lines = $this->run_git($project, $cmd);

        $result = array();
        foreach ($lines as $line) {
            if (preg_match('/^commit (.*?)$/', $line, $matches)) {
                $result[] = $matches[1];
            }
        }
        return $result;
    }

    /**
     * Get shortlog entries for the given project.
     */
    function handle_shortlog($project, $hash = 'HEAD', $page = 0)
    {
        global $conf;

        $refs_by_hash = $this->git_ref_list($project, true, true, $this->conf['shortlog_remote_labels']);

        $result = array();
        $revs = $this->git_get_rev_list(
            $project,
            $page * $this->conf['summary_shortlog'],
            $this->conf['summary_shortlog'],
            $hash
        );
        foreach ($revs as $rev) {
            $info = $this->git_get_commit_info($project, $rev);
            $refs = array();
            if (in_array($rev, array_keys($refs_by_hash))) {
                $refs = $refs_by_hash[$rev];
            }
            $result[] = array(
                'author' => $info['author_name'],
                'date' => strftime($this->conf['datetime'], $info['author_utcstamp']),
                'message' => $info['message'],
                'commit_id' => $rev,
                'tree' => $info['tree'],
                'refs' => $refs,
            );
        }
        #print_r($result);
        #die();

        return $result;
    }

    /**
     * Fetch tags data, newest first.
     *
     * @param limit maximum number of tags to return
     */
    function handle_tags($project, $limit = 0)
    {
        global $conf;

        $tags = $this->git_get_tags($project);
        $result = array();
        foreach ($tags as $tag) {
            $info = $this->git_get_commit_info($project, $tag['h']);
            $result[] = array(
                'stamp' => $info['author_utcstamp'],
                'date' => strftime($this->conf['datetime'], $info['author_utcstamp']),
                'h' => $tag['h'],
                'fullname' => $tag['fullname'],
                'name' => $tag['name'],
            );
        }

        // sort tags newest first
        // aka. two more reasons to hate PHP (figuring those out is your homework:)
        usort(
            $result,
            create_function(
                '$x, $y',
                '$a = $x["stamp"]; $b = $y["stamp"]; return ($a == $b ? 0 : ($a > $b ? -1 : 1));'
            )
        );

        // TODO optimize this some way, currently all tags are fetched when only a
        // few are shown. The problem is that without fetching the commit info
        // above, we can't sort using dates, only by tag name...
        if ($limit > 0) {
            $result = array_splice($result, 0, $limit);
        }

        return $result;
    }

    function htmlentities_wrapper($text)
    {
        return htmlentities(@iconv('UTF-8', 'UTF-8//IGNORE', $text), ENT_NOQUOTES, 'UTF-8');
    }

    function xmlentities_wrapper($text)
    {
        return str_replace(array('&', '<'), array('&#x26;', '&#x3C;'), @iconv('UTF-8', 'UTF-8//IGNORE', $text));
    }

    /**
     * Return a URL that contains the given parameters.
     */
    function makelink($dict)
    {
        //print_r($dict);
        $add = array(
            'project' => $this->project->slug,
        );
        //echo Yii::trace(CVarDumper::dumpAsString($dict),'vardump');
        unset ($dict[p]);
        $action = $dict[a];
        unset ($dict[a]);
        $dict = array_merge($add, $dict);
        //echo Yii::trace(CVarDumper::dumpAsString($dict),'vardump');
        return Route('repo' . $action, $dict);
        return Yii::app()->createUrl('project', $dict);
        $params = array();
        foreach ($dict as $k => $v) {
            $params[] = rawurlencode($k) . '=' . str_replace('%2F', '/', rawurlencode($v));
        }
        //print_r($params);
        $action = preg_split('/=/', $params[0]);
        //echo Yii::trace(CVarDumper::dumpAsString($params),'vardump');
        $action = $action[1];
        //echo "<b>$action</b><br>";
        unset($params[0]);
        if (count($params) > 0) {
            //echo 'repo/'.$action.'?'. $this->htmlentities_wrapper(join('&', $params));
            return $action . '?' . $this->htmlentities_wrapper(join('&', $params));
        }
        return '';
    }

    /**
     * Obfuscate the e-mail address.
     */
    function obfuscate_mail($mail)
    {
        return str_replace(array('@', '.'), array(' at ', ' dot '), $mail);
    }

    /**
     * Used to format RSS item title and description.
     *
     * @param info commit info from git_get_commit_info()
     */
    function rss_item_format($format, $info)
    {
        return preg_replace(
            array(
                '/{AUTHOR}/',
                '/{AUTHOR_MAIL}/',
                '/{SHORTLOG}/',
                '/{LOG}/',
                '/{COMMITTER}/',
                '/{COMMITTER_MAIL}/',
                '/{DIFFSTAT}/',
            ),
            array(
                $this->htmlentities_wrapper($info['author_name']),
                $this->htmlentities_wrapper($info['author_mail']),
                $this->htmlentities_wrapper($info['message_firstline']),
                $this->htmlentities_wrapper($info['message_full']),
                $this->htmlentities_wrapper($info['committer_name']),
                $this->htmlentities_wrapper($info['committer_mail']),
                $this->htmlentities_wrapper(isset($info['diffstat']) ? $info['diffstat'] : ''),
            ),
            $format
        );
    }

    function rss_pubdate($secs)
    {
        return gmdate('D, d M Y H:i:s O', $secs);
    }

    /**
     * Executes a git command in the project repo.
     * @return array of output lines
     */
    function run_git($project, $command)
    {
        global $conf;

        $output = array();
        $cmd = $this->conf['git'] . " --git-dir=" . escapeshellarg(
                $this->conf['projects'][$project]['repo']
            ) . " $command";
        $ret = 0;
        exec($cmd, $output, $ret);
        if ($this->conf['debug_command_trace']) {
            static $count = 0;
            $count++;
            trigger_error("[$count]\$ $cmd [exit $ret]");
        }
        //if ($ret != 0) { die('FATAL: exec() for git failed, is the path properly configured?'); }
        return $output;
    }

    /**
     * Executes a git command in the project repo, sending output directly to the
     * client.
     */
    function run_git_passthru($project, $command)
    {
        global $conf;

        $cmd = $this->conf['git'] . " --git-dir=" . escapeshellarg(
                $this->conf['projects'][$project]['repo']
            ) . " $command";
        $result = 0;
        passthru($cmd, $result);
        //echo Yii::trace(CVarDumper::dumpAsString($result),'vardump');
        return $result;
    }

    function tpl_extlink($link)
    {
        echo "<a href=\"$link\" class=\"external\">&#8599;</a>";
    }

    /**
     * Makes sure the given project is valid. If it's not, this function will
     * die().
     * @return the project
     */
    public function validate_project($project)
    {
        if (!in_array($project, array_keys($this->conf['projects']))) {
            die('Invalid project:' . $project);
        }
        return $project;
    }

    /**
     * Makes sure the given hash is valid. If it's not, this function will die().
     * @return the hash
     */
    function validate_hash($hash)
    {
        if (!preg_match('/^[0-9a-z]{40}$/', $hash) && !preg_match(
                '!^refs/(heads|tags)/[-_.0-9a-zA-Z/]+$!',
                $hash
            ) && $hash !== 'HEAD'
        ) {
            return false;

        }
        return $hash;
    }

    /**
     * Custom error handler for ViewGit. The errors are pushed to $page['notices']
     * and displayed by templates/header.php.
     */
    function vg_error_handler($errno, $errstr, $errfile, $errline)
    {
        global $page;

        $mask = ini_get('error_reporting');

        $class = 'error';

        // If mask for this error is not enabled, return silently
        if (!($errno & $mask)) {
            return true;
        }

        // Remove any preceding path until viewgit's directory
        $file = $errfile;
        $file = strstr($file, 'viewgit/');

        $message = "$file:$errline $errstr [$errno]";

        switch ($errno) {
            case E_ERROR:
                $class = 'error';
                break;
            case E_WARNING:
                $class = 'warning';
                break;
            case E_NOTICE:
            case E_STRICT:
            default:
                $class = 'info';
                break;
        }

        $page['notices'][] = array(
            'message' => $message,
            'class' => $class,
        );

        return true;
    }

    function renderLog($log, $options)
    {

    }

}
 