<div class="adjacent-items">

    <?php if ($newer) { ?>
        <p class="adjacent-item adjacent-item__next">
            <a href="<?= $newer->getUrl() ?>">
                <?= trans('laravel-blog::messages.adjacent.next_link_text', array('title' => $newer->title)) ?>
            </a>
        </p>
    <?php } ?>

    <?php if ($older) { ?>
        <p class="adjacent-item adjacent-item__prev">
            <a href="<?= $older->getUrl() ?>">
                <?= trans('laravel-blog::messages.adjacent.prev_link_text', array('title' => $older->title)) ?>
            </a>
        </p>
    <?php } ?>

</div>