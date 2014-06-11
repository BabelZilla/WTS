<div class="row" style="text-align: left;">
    <div class='six columns'>User: <?php echo $member_name; ?></div>
    <div class='five columns'><?php echo $t->updated_at; ?></div>
    <div class='one columns'><a href='#' class='btn-primary btn-mini mversions pull-right'>Restore</a></div>
    <div class='clear'></div>
    <?php if ($entity->plural_type != '') {
        $required = array_key_exists('one', $PluralRules) ? 'label-important' : 'label-info'; ?>
        <div class="one columns label <?php echo $required; ?>">
            One
        </div>
        <div class='eleven columns'><?php echo $t->one; ?></div>
        <div class='clear'></div>
        <?php $required = array_key_exists('other', $PluralRules) ? 'label-important' : 'label-info';
        if (isset($t->other)) {
            ?>
            <div class="columns one label <?php echo $required; ?>">
                Other
            </div>
            <div class='columns eleven'><?php echo $t->other; ?></div>
            <div class='clear'></div>
        <?php
        }
        $required = array_key_exists('two', $PluralRules) ? 'label-important' : 'label-info'; ?>
        <?php if (isset($t->two)) { ?>
            <div class="one columns label <?php echo $required; ?>">
                Two
            </div>
            <div class='eleven columns'><?php echo $t->two; ?></div>
            <div class='clear'></div>
        <?php
        }
        $required = array_key_exists('few', $PluralRules) ? 'label-important' : 'label-info'; ?>
        <?php if (isset($t->few)) { ?>
            <div class="one columns label <?php echo $required; ?>">
                Few
            </div>
            <div class='eleven columns'><?php echo $t->few; ?></div>
            <div class='clear'></div>
        <?php
        }
        $required = array_key_exists('many', $PluralRules) ? 'label-important' : 'label-info'; ?>
        <?php if (isset($t->many)) { ?>
            <div class="one columns label <?php echo $required; ?>">
                Many
            </div>
            <div class='eleven columns'><?php echo $t->many; ?></div>
            <div class='clear'></div>
        <?php } ?>
        <?php $required = array_key_exists('zero', $PluralRules) ? 'label-important' : 'label-warning';
        if (isset($t->zero)) {
            ?>
            <div class="one columns label <?php echo $required; ?>">
                Zero
            </div>
            <div class='eleven columns'><?php echo $t->zero; ?></div>
            <div class='clear'></div>
        <?php
        }
    } else {
        ?>
        <div class='twelve columns'><?php echo $t->one; ?></div>
        <div class='clear'></div>
    <?php } ?>
    <hr/>
</div>
 