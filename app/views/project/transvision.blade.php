<div class="row">
    <div class="large-12 columns">
        <h3 class="welcome_text" style="margin-bottom: 10px;">{{ Trans('transvision.searchheadline') }}</h3>
    </div>
</div>
<form action="" method="get">
    <div class="row">
        <div class="large-10 columns">
            <input type="text" name="recherche" id="recherche" value="<?php echo $term; ?>"
                   placeholder="{{ Trans('transvision.placeholder') }}" size="30"/>
        </div>
        <div class="large-2 columns">
            <input class="button success" type="submit" value="{{ Trans('transvision.search') }}" alt="Search"/>
        </div>
    </div>
    <ul class="small-block-grid-5 tranvisiongrid">
        <li>
            <fieldset class="fs_transvision">
                <legend>{{ Trans('transvision.repository') }}</legend>
                <?php echo $repo_html; ?>
            </fieldset>
        </li>
        <li>
            <fieldset class="fs_transvision">
                <legend>{{ Trans('transvision.source_lang') }}</legend>
                <span id="sourcelang">
                    {{ $sl_html }}
                </span>
            </fieldset>
        </li>
        <li>
            <fieldset class="fs_transvision">
                <legend>{{ Trans('transvision.target_lang') }}</legend>
                <span id="targetlang">
                    {{ $tl_html }}
                </span>
            </fieldset>
        </li>
        <li>
            <fieldset class="fs_transvision">
                <legend>{{ Trans('transvision.search_in') }}</legend>
                <?php echo $st_html; ?>
            </fieldset>
        </li>
        <li>
            <fieldset class="fs_transvision">
                <legend>{{ Trans('transvision.option') }}</legend>
                <label for="case_sensitive" class="right">{{ Trans('transvision.case_sensitive') }}</label>
                <input type="checkbox"
                       name="case_sensitive"
                       id="case_sensitive"
                       value="case_sensitive"
                    />

                <div class="clear"></div>
                <label for="whole_word" class="right">{{ Trans('transvision.whole_world') }}</label>
                <input type="checkbox"
                       name="whole_word"
                       id="whole_word"
                       value="whole_word"
                    />

                <div class="clear"></div>
                <label for="perfect_match" class="right">{{ Trans('transvision.perfect_match') }}</label>
                <input type="checkbox"
                       name="perfect_match"
                       id="perfect_match"
                       value="perfect_match"
                    />

                <div class="clear"></div>
            </fieldset>
        </li>
    </ul>
</form>
</div>
</br>
<div id="transvision_results" style="text-align: left;">
    <div class="row">
        <div class="large-12 columns">
            <ul class="small-block-grid-3 blog_post" style="margin: 15px;">
                <li class="text-center">Entity</li>
                <li class="text-center">{{ $source_language }}</li>
                <li class="text-center">{{ $locale }}</li>
                <hr>
                <?php
                if ($answer) {
                    if (!$whole_word && !$perfect_match) {
                        $recherche = WtsHelper::uniqueWords($term);
                    } else {
                        $recherche = array($recherche);
                    }
                    foreach ($answer as $key => $strings) {
                        // Don't highlight search matches in entities when searching strings
                        if ($search_type == 'strings') {
                            $result_entity = WtsHelper::formatEntity($key);
                        } else {
                            $result_entity = WtsHelper::formatEntity($key, $recherche[0]);
                        }
                        $component = explode('/', $key)[0];
                        $skey = key($strings);
                        $source_string = trim($skey);
                        $target_string = trim($strings->$skey);
                        $entity_link = "?sourcelocale={$locale1}"
                            . "&locale={$locale2}"
                            . "&repo={$search_options['repo']}"
                            . "&search_type=entities&recherche={$key}";
                        foreach ($recherche as $val) {
                            $source_string = WtsHelper::markString($val, $source_string);
                            $target_string = WtsHelper::markString($val, $target_string);
                        }
                        $source_string = WtsHelper::highlightString($source_string);
                        $target_string = WtsHelper::highlightString($target_string);
                        $replacements = array(
                            ' ' => '<span class="highlight-gray" title="Non breakable space"> </span>', // nbsp highlight
                            ' ' => '<span class="highlight-red" title="Thin space"> </span>', // thin space highlight
                            '…' => '<span class="highlight-gray">…</span>', // right ellipsis highlight
                            '&hellip;' => '<span class="highlight-gray">…</span>', // right ellipsis highlight
                        );

                        $target_string = WtsHelper::multipleStringReplace($replacements, $target_string);

                        $temp = explode('-', $locale1);
                        $locale1_short_code = $temp[0];

                        $temp = explode('-', $locale2);
                        $locale2_short_code = $temp[0];
                        echo "<li class='resentity'>$result_entity</li>";
                        echo "<li>$source_string</li>";
                        echo "<li>$target_string</li>";
                        echo "<hr>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>