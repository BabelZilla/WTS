<?php if (!$comments->isEmpty()) {
    $comments->load('user');
    ?>
    <ol class="comments--list">
        <?php foreach ($comments as $comment) { ?>
            <li class="comment" id="C<?php echo $comment->id ?>">
                <p class="comment--text">
                    <?php echo nl2br(htmlspecialchars($comment->comment, null, 'UTF-8')) ?>
                </p>

                <p class="comment--author">
                    <?php echo $comment->user->username; ?>
                </p>

                <p class="comment--date">
                    <?php echo $comment->getDate(); ?>
                </p>
            </li>
        <?php } ?>
    </ol>
<?php } ?>
<p class="no-comments">
    <?php echo trans('laravel-comments::messages.no_comments') ?>
</p>
<php } ?>