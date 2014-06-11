<?php if (isset($archives) && !empty($archives)) { ?>
    <section class="large-4 columns">
        <ul class="archives">
            <?php foreach ($archives as $year => $months) { ?>
                <li class="archives--year<?= isset($selectedYear) && $year == $selectedYear ? ' archives--year__active' : '' ?>"><?= $year ?>
                    <ul>
                        <?php foreach ($months as $monthNumber => $month) { ?>
                            <li class="archives--month<?= isset($selectedYear) && $year == $selectedYear && isset($selectedMonth) && $monthNumber == $selectedMonth ? ' archives--month__active' : '' ?>">
                                <a href="<?= action('Fbf\LaravelBlog\PostsController@indexByYearMonth', array('year' => $year, 'month' => $monthNumber)) ?>">
                                    <?= $month['monthname'] ?> (<?= $month['count'] ?>)
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </section>
<?php } ?>
