<?php
/**
 * Created by PhpStorm.
 * User: jbt
 * Date: 16.03.14
 * Time: 00:11
 */
?>
<?php
if ($orgstr) {
    switch ($orgstr->status) {
        case 'reverify':
            $status_class = 'status-reverify';
            break;
        case 'waiting':
            $status_class = 'status-unproofed';
            break;
        default:
            $status_class = $orgstr ? 'status-translated' : 'status-untranslated';
            break;
    }
} else {
    $orgstr = new translatedStrings();
    $status_class = 'status-untranslated';
}
?>
<div class="<?php echo $status_class; ?> large-12 columns" id="row-<?php echo $entity->id; ?>"
     style="border-bottom:1px dashed; border-top:1px dashed; margin-bottom: 2px; padding-bottom:5px;">
<?php if ($entity->comment) { ?>
    <div class="large-12 columns developer_comment">
        <small><b><?php echo nl2br($entity->comment) ?></b></small>
    </div>
<?php } ?>

<div class="large-6 columns"><b><?php echo $entity->context; ?></b>
    <?php
    if ($entity->status === 'changed') {
        echo '  <i class="icon-warning-sign"></i>';
    } ?>
</div>
<div class="large-6 columns">
    <div class="row">
        <div class="large-6 columns">
            <div class="row collapse">
                <div class="small-10 columns">
                    <label>
                        <input type="checkbox" class="cb_untranslated" data-context="<?php echo $entity->context; ?>">
                        Untranslated
                    </label>
                </div>
            </div>
        </div>
        <div class="large-6 columns">
            <div class="row collapse">
                <div class="small-9 columns">
                    <label>
                        <input type="checkbox" class="cb_blank" data-context="<?php echo $entity->context; ?>">
                        Blank
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if ($entity->plural_type != '') {
    $required = array_key_exists('one', $PluralRules) ? 'label-important' : 'label-info';
    if ((isset($entity->one)) || (array_key_exists('one', $PluralRules))) {
        ?>
        <div class="large-5 columns">
            <textarea readonly class="original" style="width: 100%"><?php echo WtsHelper::prepare_original(
                    WtsHelper::esc_translation($entity->one)
                ); ?></textarea>
        </div>
        <div class="large-1 columns label <?php echo $required ?>" style="margin-top:1.5%">
            One
        </div>
        <div class="large-6 columns">
            <textarea id="<?php echo $entity->context; ?>" name="<?php echo $status_class ?>"
                      data-plural="one" class="live"
                      style="width: 100%"><?php echo WtsHelper::esc_translation(
                    $orgstr->one
                ); ?></textarea>
        </div>
        <div class="clear"></div>
    <?php
    }
    $required = array_key_exists('other', $PluralRules) ? 'label-important' : 'label-info';

    if ((isset($entity->other)) || (array_key_exists('other', $PluralRules))) {
        ?>

        <div class="large-5 columns">
            <textarea readonly style="width: 100%" class="live"><?php echo WtsHelper::prepare_original(
                    WtsHelper::esc_translation($entity->other)
                ); ?></textarea>
        </div>
        <div class="large-1 columns label <?php echo $required ?>" style="margin-top:1.5%">
            Other
        </div>
        <div class="large-6 columns">
            <textarea id="<?php echo $entity->context; ?>" name="<?php echo $status_class ?>"
                      data-plural="other" class="live"
                      style="width: 100%"><?php echo WtsHelper::esc_translation(
                    $orgstr->other
                ); ?></textarea>
        </div>
        <div class="clear"></div>

    <?php
    }
    $required = array_key_exists('two', $PluralRules) ? 'label-important' : 'label-info';
    if ((isset($entity->two)) || (array_key_exists('two', $PluralRules))) {
        ?>

        <div class="large-5 columns">
            <textarea readonly style="width: 100%"><?php echo WtsHelper::prepare_original(
                    WtsHelper::esc_translation($entity->two)
                ); ?></textarea>
        </div>
        <div class="large-1 columns label <?php echo $required ?>" style="margin-top:1.5%">
            Two
        </div>
        <div class="large-6 columns">
            <textarea id="<?php echo $entity->context; ?>" name="<?php echo $status_class ?>"
                      data-plural="two" class="live"
                      style="width: 100%"><?php echo WtsHelper::esc_translation(
                    $orgstr->two
                ); ?></textarea>
        </div>
        <div class="clear"></div>
    <?php
    }
    $required = array_key_exists('few', $PluralRules) ? 'label-important' : 'label-info';
    if ((isset($entity->few)) || (array_key_exists('few', $PluralRules))) {
        ?>

        <div class="large-5 columns">
            <textarea readonly style="width: 100%"><?php echo WtsHelper::prepare_original(
                    WtsHelper::esc_translation($entity->few)
                ); ?></textarea>
        </div>
        <div class="large-1 columns label <?php echo $required; ?>" style="margin-top:1.5%">
            Few
        </div>
        <div class="large-6 columns">
            <textarea id="<?php echo $entity->context; ?>" name="<?php echo $status_class ?>"
                      data-plural="few" class="live"
                      style="width: 100%"><?php echo WtsHelper::esc_translation(
                    $orgstr->few
                ); ?></textarea>
        </div>
        <div class="clear"></div>
    <?php
    }
    $required = array_key_exists('many', $PluralRules) ? 'label-important' : 'label-info';
    if ((isset($entity->many)) || (array_key_exists('many', $PluralRules))) {
        ?>

        <div class="large-5 columns">
            <textarea readonly style="width: 100%"> <?php echo WtsHelper::prepare_original(
                    WtsHelper::esc_translation($entity->many)
                ); ?></textarea>
        </div>
        <div class="large-1 columns label <?php echo $required; ?>" style="margin-top:1.5%">
            Many
        </div>
        <div class="large-6 columns">
            <textarea id="<?php echo $entity->context; ?>" name="<?php echo $status_class ?>"
                      data-plural="many" class="live"
                      style="width: 100%"><?php echo WtsHelper::esc_translation(
                    $orgstr->many
                ); ?></textarea>
        </div>
        <div class="clear"></div>
    <?php
    }
    $required = array_key_exists('zero', $PluralRules) ? 'label-important' : 'label-warning';
    if ((isset($entity->zero)) || (array_key_exists('zero', $PluralRules))) {
        ?>

        <div class="large-5 columns">
            <textarea readonly style="width: 100%"><?php echo WtsHelper::prepare_original(
                    WtsHelper::esc_translation($entity->zero)
                ); ?></textarea>
        </div>
        <div class="large-1 columns label <?php echo $required; ?>" style="margin-top:1.5%">
            Zero
        </div>
        <div class="large-6 columns">
            <textarea id="<?php echo $entity->context; ?>" name="<?php echo $status_class ?>"
                      data-plural="zero" class="live"
                      style="width: 100%"><?php echo WtsHelper::esc_translation(
                    $orgstr->zero
                ); ?></textarea>
        </div>
        <div class="clear"></div>
    <?php
    }
} else {
    ?>
    <div class="large-6 columns">
        <textarea readonly style="width: 100%"><?php echo WtsHelper::prepare_original(
                WtsHelper::esc_translation($entity->one)
            ); ?></textarea>
    </div>
    <div class="large-6 columns">
        <textarea id="<?php echo $entity->context; ?>" name="<?php echo $status_class ?>"
                  data-plural="one" class="live"
                  style="width: 100%"><?php echo WtsHelper::esc_translation(
                $orgstr->one
            ); ?></textarea>
    </div>
<?php } ?>
<div class="large-6 columns">&NonBreakingSpace;
</div>
<div class="large-4 columns">
    <div class="btn-group btn-xs">
        <a href="#" class="btn btn-info btn-mini btncopy">Copy</a>
        <?php $ov = $orgstr->version ? ($orgstr->version - 1) : 'No ';
        $disabled = $orgstr->version ? '' : ' disabled'?>
        <a href="#myModal" data-show="3" data-versions="<?php echo $ov; ?>"
           data-context="<?php echo $entity->context; ?>"
           class="btn btn-info btn-mini mversions<?php echo $disabled; ?>"><?php echo $ov; ?> older Versions
        </a>
        <a href="#myModal" data-context="<?php echo $entity->context; ?>"
           class="btn btn-info btn-mini msuggest"><i class="icon-comment icon-white"> Suggestions</i></a>
        <a href="#myModal" data-context="<?php echo $entity->context; ?>"
           class="btn btn-info btn-mini mpreview" id="openBtn">Preview</a>
    </div>
</div>
<div class="large-2 columns">
    <button type="button" class="btn btn-danger btn-mini btndel">Delete</button>
</div>
<div class="large-12 columns">
    Large 12
</div>
</div>
 