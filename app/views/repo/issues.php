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
</style>
<h3>Issues for <?= $project->name; ?> on Github</h3><h6 class="subheader">Only for information.</h6><br/>
<div class="row">
    <div class="large-12 columns">
        <dl class="tabs" data-tab>
            <dd class="tab-title active"><a href="#panel2-1">Open</a></dd>
            <dd class="tab-title"><a href="#panel2-2">Closed</a></dd>
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
                        <div class="panel">
                            <?php foreach ($issues as $issue) { ?>
                                <div class="row">
                                    <div class="issuelistbody">
                                        <div class="large-1 column">
                                            <i class="fa fa-ban" style="color: green;"></i>
                                        </div>
                                        <div class="large-10 columns">

                                            <div class="issuetitle">
                                                <?php
                                                if (isset($issue['labels'])) {
                                                    $labelhtml = '';
                                                    foreach ($issue['labels'] as $issuelabel) {
                                                        $labelhtml .= "<span class='label' style='margin: 2px 2px; padding: 2px 2px; background: #" . $issuelabel['color'] . "'>" . $issuelabel['name'] . "</span>";
                                                    }
                                                }
                                                $link = route('repocomments', array('id' => $project->slug, 'cid' => $issue['number']));
                                                echo '<a href="' . $link . '">' . $issue['title'] . '</a>' . $labelhtml; ?>
                                            </div>
                                        </div>
                                        <div class="large-1 column">
                                            <span class="issuenumber"><? echo '# ' . $issue['number']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-1 column">
                                    </div>
                                    <div class="large-11 columns">
                                        <div class="issueinfo">
                                            Opended by: <?php echo $issue['user']['login']; ?>
                                            on <?php echo date("d-M-y", strtotime($issue['created_at'])); ?>
                                            <?php if ($issue['comments'] > 0) echo '<i class="fa fa-comments"></i>' . $issue['comments'] . " comments"; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
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
                        <div class="panel">
                            <?php foreach ($issuesClosed as $issue) { ?>
                                <div class="row">
                                    <div class="issuelistbody">
                                        <div class="large-1 column">
                                            <i class="fa fa-check-circle-o" style="color: red;"></i>
                                        </div>
                                        <div class="large-10 columns">

                                            <div class="issuetitle">
                                                <?php
                                                if (isset($issue['labels'])) {
                                                    $labelhtml = '';
                                                    foreach ($issue['labels'] as $issuelabel) {
                                                        $labelhtml .= "<span class='label' style='margin: 2px 2px; padding: 2px 2px; background: #" . $issuelabel['color'] . "'>" . $issuelabel['name'] . "</span>";
                                                    }
                                                }
                                                $link = route('repocomments', array('id' => $project->slug, 'cid' => $issue['number']));
                                                echo '<a href="' . $link . '">' . $issue['title'] . '</a>' . $labelhtml;
                                                ?>
                                            </div>

                                        </div>
                                        <div class="large-1 column">
                                            <span class="issuenumber"><? echo '# ' . $issue['number']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-1 column">
                                    </div>
                                    <div class="large-11 columns">
                                        <div class="issueinfo">
                                            Opended by: <?php echo $issue['user']['login']; ?>
                                            on <?php echo date("d-M-y", strtotime($issue['created_at'])); ?>
                                            <?php if ($issue['comments'] > 0) echo '<i class="fa fa-comments"></i>' . $issue['comments'] . " comments"; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>