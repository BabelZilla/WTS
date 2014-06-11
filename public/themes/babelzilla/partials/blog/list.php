<section class="large-8 columns">
    <div class="item-list">

        <?php if (!$posts->isEmpty()) { ?>
            <?php foreach ($posts as $post) { ?>
                <article class="item<?= $post->is_sticky ? ' item__sticky' : '' ?> blog_post">

                    <h3 class="item--title">
                        <a href="<?= $post->getUrl() ?>" title="<?= $post->title ?>">
                            <?= $post->title; ?>
                        </a>
                    </h3>

                    <p class="item--date">
                        <?= $post->getDate() ?>
                    </p>
                    <?php if (!empty($post->you_tube_video_id)) { ?>
                        <div class="item--thumb item--thumb__youtube">
                            <a href="<?= $post->getUrl() ?>" title="<?= $post->title ?>">
                                <?= $post->getYouTubeThumbnailImage() ?>
                            </a>
                        </div>
                    <?php } elseif (!empty($post->main_image)) { ?>
                        <div class="item--thumb item--thumb__image">
                            <a href="<?= $post->getUrl() ?>" title="<?= $post->title ?>">
                                <?= $post->getImage('main_image', 'thumbnail') ?>
                            </a>
                        </div>
                    <? } ?>
                    <div class="item--summary">
                        <?= $post->summary ?>
                    </div>

                    <p class="item--more-link">
                        <a href="<?= $post->getUrl() ?>" title="<?= $post->title ?>">
                            <?= trans('laravel-blog::messages.list.more_link_text') ?>
                        </a>
                    </p>
                </article>
            <?php } ?>
            <?= $posts->links() ?>
        <?php } else { ?>
            <p class="item-list--empty">
                {{ trans('laravel-blog::messages.list.no_items') }}
            </p>
        <?php } ?>
    </div>
</section>