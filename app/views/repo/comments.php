<div class="row">
    <div class="large-12 columns">
        <h4><?php echo $details['title'] . ' #' . $details['number']; ?></h4>
    </div>
</div>
<div class="row">
    <div class="large-1 columns">
        <?php if (isset($details['closed_by'])) { ?>
            <span class="label" style="background: red;">Closed</span>
        <?php } else { ?>
            <span class="label" style="background: green;">Open</span>
        <?php } ?>
    </div>
    <div class="large-11 columns" style="font-size: 0.8rem;">
        <?php echo $details['user']['login']; ?> opened this Issue
        on <?php echo date("d-M-y", strtotime($details['created_at'])); ?> · <?= count($comments); ?> comments
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
                    <?php echo $details['user']['login']; ?>
                    <small>commented on
							<span class="data">
								<?php echo date("d-M-y", strtotime($details['created_at'])); ?>
							</span>
                    </small>
                </h6>
            </section>
            <section class="content">
                <p>
                    <?php echo $details['body']; ?>
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
                            <i class="img"><?php echo WtsHelper::get_gravatar($comment['user']['gravatar_id'], $s = 32, $d = 'mm', $r = 'g', true); ?></i><?php echo $comment['user']['login']; ?>
                        <?php } else { ?>
                            <i class="icon"></i>
                        <? } ?>
                        <small>commented on
							<span class="data">
								<?php echo date("d-M-y", strtotime($comment['created_at'])); ?>
							</span>
                        </small>
                    </h6>
                </section>
                <section class="content">
                    <p>
                        <?php echo $comment['body']; ?>
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
            Closed by <?php echo $details['closed_by']['login'] ?>
            at <?php echo date("d-M-y", strtotime($details['closed_at'])); ?>
        </div>
    </div>
<?php } ?>