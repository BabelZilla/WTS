<h1 class="welcome_text" style="margin-bottom: 10px;">Transvision search</h1>
<form action="" method="get">
    <div class="row">
        <div class="large-10 columns">
            <input type="text" name="recherche" id="recherche" value="<?php echo $term; ?>"
                   placeholder="Type your search here" size="30"/>
        </div>
        <div class="large-2 columns">
            <input class="button success" type="submit" value="Search" alt="Search"/>
        </div>
    </div>
    <div class="row">
        <div class="large-2 columns">
            <fieldset>
                <legend style="background-color: #F3F3F3;">Repository</legend>
                <select id='repository' name='repo'>
                    <?php echo $repo_html; ?>
                </select>
            </fieldset>
        </div>
        <div class="large-2 columns">
            <fieldset>
                <legend>Source</legend>
                <select id='source_locale' name='sourcelocale'>
                    <?php echo $sl_html; ?>
                </select>
            </fieldset>
        </div>
        <div class="large-2 columns">
            <fieldset>
                <legend>Target</legend>
                <select id='target_locale' name='locale'>
                    <?php echo $tl_html; ?>
                </select>
            </fieldset>
        </div>
        <div class="large-6 columns">
            <div class="row">
                <fieldset id="fs_advanced">
                    <legend>Advanced Search options</legend>
                <span class="large-3 columns">
                    <input type="checkbox"
                           name="case_sensitive"
                           id="case_sensitive"
                           value="case_sensitive"
                        />
                    <label for="case_sensitive">Case Sensitive</label>
                </span>
                <span class="large-3 columns">
                    <input type="checkbox"
                           name="wild"
                           id="wild"
                           value="wild"
                        />
                    <label for="wild">Wildcard (*)</label>
                </span>
                <span class="large-3 columns">
                    <input type="checkbox"
                           name="whole_word"
                           id="whole_word"
                           value="whole_word"
                        />
                    <label for="whole_word">Whole Word</label>
                </span>
                <span class="large-3 columns">
                    <input type="checkbox"
                           name="perfect_match"
                           id="perfect_match"
                           value="perfect_match"
                        />
                    <label for="perfect_match">Perfect Match</label>
                </span>
                </fieldset>
            </div>
        </div>
        <div class="large-12 columns">
            <p style="text-align: center; font-size: 10px; font-style: italic;">Transvision is a tool provided by the
                French Mozilla community,<a href="http://www.mozfr.org/">MozFR.</a></p>
        </div>
    </div>
</form>
</br>
<div id="transvision_results" style="text-align: left;">
    <?php
    if ($answer) {
    foreach ($answer as $key => $val) {
    $sterm = $key;
    $found = key($val);
    //echo _levenshtein($term,$found);
    $foundstr = WtsHelper::markString($term, $found);
    $result = $val->{$found};
    ?>

    <div class="row">
        <div class="large-12 columns" style="font-size: 12px; box-sizing: border-box;">
            <?php echo WtsHelper::formatEntity($sterm); ?>
        </div>
    </div>
    <div class="row">
        <div class="large-6 columns"><?php echo WtsHelper::highlightString($foundstr); ?></div>
        <div class="large-6 columns"><?php echo htmlspecialchars($result); ?></div>
    </div>
<?php
}
}

 