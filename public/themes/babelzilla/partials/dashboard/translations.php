<?php
if (count($translations)) {
    ?>
    <table cellspacing="0" cellpadding="0" width="100%" id="memberTrans">
        <thead align="left" valign="middle">
        <tr>
            <th>Name</th>
            <th>Lang.</th>
            <th>Progress</th>
            <th></th>
            <th>Status</th>
            <th>Open</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($translations as $translation) {
            //print_r($translation);
            if ($translation['originalStrings'] == 0) {
                $percentageDone = 0;
            } else {
                $percentageDone = intval($translation['translatedStrings'] / $translation['originalStrings'] * 100);
            }
            //$percentageDone = intval($TranslatedCount / $OriginalCount * 100);
            $percentageMissing = 100 - $percentageDone;
            $missingCount = $translation['originalStrings'] - $translation['translatedStrings'];
            /*if ((isOwner($translation->id)) || (isTranslator($translation->id,$translation->lang_id)) || isLocalMod($member_id,$translation->lang_id))
            {
                $statlist = getStatusList($translation->trans_status,"$translation->name~$translation->id~$translation->lang_id~$translation->langname");
            } else {
                $statlist = '';
            }
            $per = getPercent($translation->totalstrings,$translation->strings_translated);
            $percent = drawProgressExtended($translation->totalstrings,$translation->strings_translated,'red','green',true,'black','1px','17px','99%',true,'2px','#FFF',true,15,1,'',true,15,1,'');
            $translationlink = "<a href='index.php?option=com_wts&Itemid=$Itemid&language=$translation->lang_id&extension=$translation->id&type=filelist2'>$translation->name</a>";
            $openbox = '<input type="checkbox" class="co" name="'.$translation->longname." - ".$translation->langname.'" id="open-'.$translation->lang_id.'-'.$translation->id.'-'.$translation->name.'" value="open"';
            if ($translation->open) $openbox .= 'checked="checked"';
            $openbox .= '>';
            if ($translation->superseded_by > 0) {
                $sup_name = $dblang->getLangName ($translation->superseded_by);
                $sup_title = "This language has been superseded by \"$sup_name\"";
                $sup_img = "<img src='images/sup_warning.png' title='$sup_title'/>";
            } else {
                $sup_img = '';
            }*/
            //." - ".$translation->superseded_by
            $openbox = '<input id="checkbox2" type="checkbox" style="display: none;" checked=""><span class="custom checkbox checked"></span>';
            ?>

            <tr>
                <td><?= $translation['project']->name ?></td>
                <td><?= $translation['language'] . "&nbsp;" ?></td>
                <td>
                    <div class="round nice progress success" style="margin-top: 0.5rem;"><span class="meter"
                                                                                               style="width: <?php echo $percentageDone ?>%"></span>
                    </div>
                </td>
                <td><?= $percentageDone ?></td>
                <td><?= $translation['status']; ?></td>
                <td style="vertical-align: middle; text-align: center;">
                    <input id="checkbox2" type="checkbox" style="display: none;" checked=""><span
                        class="custom checkbox checked"></span>
                </td>
            </tr>
        <? } ?>
        </tbody>
    </table>
<?php } ?>