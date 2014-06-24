<style>
    i.icon {
        display: inline-block;
        width: 32px;
        height: 32px;
        background: #ebebeb;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 0;
        margin-top: -16px;
    }

    i.icon::before {
        content: "";
        display: block;
        background: #c2c2c2;
        width: 10px;
        height: 10px;
        border-radius: 1000px;
        position: absolute;
        left: 50%;
        margin-left: -5px;
        top: 5px;
    }

    i.icon::after {
        content: "";
        display: block;
        background: #c2c2c2;
        width: 20px;
        height: 10px;
        border-radius: 1000px 1000px 0 0;
        display: block;
        position: absolute;
        left: 50%;
        margin-left: -10px;
        top: 15px;
    }

    h6.byline {
        padding-left: 40px;
        position: relative;
        margin-bottom: 15px;
        margin-top: 10px;
    }

    h6.byline .data {
        font-weight: 400;
    }

    h6.byline .label {
        font-size: 60%;
    }

    .indented.comment {
        padding-left: 15px;
        border-left: 1px solid #ebebeb;
    }

    .push {
        margin-bottom: 40px;
    }

    .bullets {
        margin-left: 30px;
    }

    .issuelabels {
        border-left-style: solid;
        border-left-width: 3px;
        margin-bottom: 8px;
    }

    .issuelabels span {
        font-size: 0.9rem;
        padding-left: 3px;
    }

    .issuelistbody {
        margin-bottom: 5px;
    }

    .issueinfo {
        font-size: 0.8em;
    }

    .issuenumber {
        font-size: 0.8em;
    }

    .test li + li {
        border-top: 1px solid black;
    }

    .issuetitle a {
        background: none !important;
        color: black;
    }

    .glitem {
        position: relative;
        display: block;
        margin-bottom: -1px;
        padding: 8px 10px 10px 40px;
        border: 1px solid #e5e5e5;
    }

    .glitem:first-child {
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
    }

    .glitem:last-child {
        margin-bottom: 0;
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
    }

    .glitem-number {
        color: #999;
        float: right;
        font-size: 13px;
        margin-left: 12px;
        position: relative;
        top: 2px;
    }

    .glitem-meta {
        color: #999999;
        font-size: 11px;
        line-height: 17px;
        list-style-type: none;
        overflow: hidden;
    }

    .glitem-meta > li {
        display: inline-block;
        margin-right: 4px;
    }

    .glitem-name {
        font-size: 15px;
        line-height: 1.3;
        margin: 0 60px 2px 0;
        word-wrap: break-word;
    }

    .glitem h4 {
        font-size: 1rem;
    }

    .glitem a {
        background: none repeat scroll 0 0 rgba(0, 0, 0, 0) !important;
        color: black;
    }
</style>
<h3>{{ Trans('repo.issuefor', array('projectname' => $project->name)) }}</h3><h6 class="subheader">{{
    Trans('repo.onlyforinfo') }}</h6><br/>
<div class="row">
    <div class="large-12 columns">
        <dl class="tabs" data-tab>
            <dd class="tab-title active"><a href="#panel2-1">{{ Trans('repo.open') }}</a></dd>
            <dd class="tab-title"><a href="#panel2-2">{{ Trans('repo.closed') }}</a></dd>
        </dl>
        <div class="tabs-content">
            <div class="content active" id="panel2-1">
                <div class="row">
                    <div class="large-3 columns">
                        <div class="panel">
                            <?php foreach ($labelsOpen as $label) {
                                ?>
                                <div class="issuelabels" style="border-left-color: #<?= $label['color']; ?>;">
                                    <span><?php echo $label['name']; ?></span><span
                                        class="right"><?php echo $label['count']; ?></span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="large-9 columns">
                        <ul>
                            <?php foreach ($issues as $issue) { ?>
                                <li class="glitem panel">
                                    <span class="glitem-number">#{{ $issue['number'] }} </span>
                                    <h4 class="glitem-name">
                                        <?php
                                        $count = $issue['comments'];
                                        //$icclass = array_key_exists('pull_request', $issue) ?  'octicon octicon-git-pull-request' : 'octicon octicon-issue-closed';
                                        $link = route('repocomments', array('id' => $project->slug, 'cid' => $issue['number']));
                                        if (isset($issue['labels'])) {
                                            $labelhtml = '';
                                            foreach ($issue['labels'] as $issuelabel) {
                                                $labelhtml .= "<span class='label' style='margin: 2px 2px; padding: 2px 2px; background: #" . $issuelabel['color'] . "'>" . $issuelabel['name'] . "</span>";
                                            }
                                        }?>
                                        <span class="octicon octicon-issue-opened" style="color: green;"></span>
                                        <a href=" {{ $link }}">{{ $issue['title'] }}</a>
                                        <span class="labels">
                                            {{ $labelhtml }}
                                        </span>
                                    </h4>
                                    <ul class="glitem-meta">
                                        <li>
                                            <?php
                                            $format = Trans('repo.dateformat');
                                            $date = WtsHelper::formatdate(strtotime($issue['created_at']), App::Getlocale(), $format);
                                            ?>
                                            {{ Trans('repo.openedbyon', array('date' => $date, 'user' =>
                                            $details['user']['login'])) }}
                                        </li>
                                        @if ($issue['comments'] > 0)
                                        <li>
                                            <span class="octicon octicon-comment-discussion"></span> <a
                                                href="{{ $link }}">@choice('repo.comments', $count, [],
                                                $currentlocale)</a>
                                        </li>
                                        @endif
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content" id="panel2-2">
                <div class="row">
                    <div class="large-3 columns">
                        <div class="panel">
                            <?php foreach ($labelsClosed as $label) {
                                ?>
                                <div class="issuelabels" style="border-left-color: #<?= $label['color']; ?>;">
                                    <span><?php echo $label['name']; ?></span><span
                                        class="right"><?php echo $label['count']; ?></span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="large-9 columns">
                        <ul>
                            <?php foreach ($issuesClosed as $issue) { ?>
                                <li class="glitem panel">
                                    <span class="glitem-number">#{{ $issue['number'] }} </span>
                                    <h4 class="glitem-name">
                                        <?php
                                        $count = $issue['comments'];
                                        $icclass = array_key_exists('pull_request', $issue) ? 'octicon octicon-git-pull-request' : 'octicon octicon-issue-closed';
                                        $link = route('repocomments', array('id' => $project->slug, 'cid' => $issue['number']));
                                        if (isset($issue['labels'])) {
                                            $labelhtml = '';
                                            foreach ($issue['labels'] as $issuelabel) {
                                                $labelhtml .= "<span class='label' style='margin: 2px 2px; padding: 2px 2px; background: #" . $issuelabel['color'] . "'>" . $issuelabel['name'] . "</span>";
                                            }
                                        }?>
                                        <span class="{{ $icclass }}" style="color: red;"></span>
                                        <a href=" {{ $link }}">{{ $issue['title'] }}</a>
                                        <span class="labels">
                                            {{ $labelhtml }}
                                        </span>
                                    </h4>
                                    <ul class="glitem-meta">
                                        <li>
                                            Opened by {{ $issue['user']['login'] }}
                                            {{ date("d-M-y", strtotime($issue['created_at'])) }}
                                        </li>
                                        @if ($issue['comments'] > 0)
                                        <li>
                                            <span class="octicon octicon-comment-discussion"></span> <a
                                                href="{{ $link }}">@choice('repo.comments', $count, [],
                                                $currentlocale)</a>
                                        </li>
                                        @endif
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
