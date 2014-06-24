<style>.state {
        background-color: #999;
        border-radius: 3px;
        color: #fff;
        display: inline-block;
        font-weight: bold;
        line-height: 20px;
        padding: 4px 8px;
        text-align: center;
        margin-bottom: 5px;
    }</style>
<div class="row">
    <div class="large-12 columns">
        <h4>{{ $details['title'] . ' #' . $details['number'] }}</h4>
    </div>
</div>
<div class="row">
    <div class="large-2 columns">
        <?php if (isset($details['closed_by'])) { ?>
            <span class="state" style="background: red;"><span class="octicon octicon-issue-closed"></span> {{ Trans('repo.closed') }}</span>
        <?php } else { ?>
            <span class="state" style="background: green;"><span class=" octicon octicon-issue-opened"></span> {{ Trans('repo.open') }}</span>
        <?php } ?>
    </div>
    <div class="large-10 columns" style="font-size: 0.8rem; line-height: 20px;">
        <?php
        $count = count($comments);
        $date = date("d-M-y", strtotime($details['created_at']));
        ?>
        {{ Trans('repo.openedbyon', array('date' => $date, 'user' => $details['user']['login'])) }} ·
        @choice('repo.comments', $count, [], $currentlocale)
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <div class="comment blog_post">
            <section class="top">
                <h6 class="byline">
                    <?php if ($details['user']['gravatar_id']) { ?>
                        <i class="img"><?php echo WtsHelper::get_gravatar($details['user']['gravatar_id'], $s = 32, $d = 'mm', $r = 'g', true); ?></i><?php echo $comment['user']['login']; ?>
                    <?php } else { ?>
                        <i class="icon"></i>
                    <? } ?>
                    {{ $details['user']['login'] }}
                    <small>{{ Trans('repo.commentedon') }}
							<span class="data">
								{{ date("d-M-y", strtotime($details['created_at'])) }}
							</span>
                    </small>
                </h6>
            </section>
            <section class="content">
                <p>
                    {{ $details['body'] }}
                </p>
            </section>
        </div>
    </div>
</div>
<?php foreach ($comments as $comment) { ?>
    <div class="row">
        <div class="large-12 columns">
            <div class="comment blog_post">
                <section class="top">
                    <h6 class="byline">
                        <?php if ($comment['user']['gravatar_id']) { ?>
                            <i class="img">{{ WtsHelper::get_gravatar($comment['user']['gravatar_id'], $s = 32, $d =
                                'mm', $r = 'g', true) }}</i>{{ $comment['user']['login'] }}
                        <?php } else { ?>
                            <i class="icon"></i>
                        <? } ?>
                        <small>{{ Trans('repo.commentedon') }}
							<span class="data">
								{{ date("d-M-y", strtotime($comment['created_at'])) }}
							</span>
                        </small>
                    </h6>
                </section>
                <section class="content">
                    <p>
                        {{ $comment['body'] }}
                    </p>
                </section>
            </div>
        </div>
    </div>
<?php
}
if (isset($details['closed_by'])) {
    ?>
    <div class="row">
        <div class="large-12 columns panel callout radius">
            {{ Trans('repo.closedby') }} {{ $details['closed_by']['login'] }}
            at {{ date("d-M-y", strtotime($details['closed_at'])) }}
        </div>
    </div>
<?php } ?>