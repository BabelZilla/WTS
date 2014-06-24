<script>
    var pid =
    <?php echo $project->project_id;?>
</script>
<div class="page-header">
    <h3 class="wtstitle">{{ Trans('wts.parselangs') }} <br>

        <p class="subheader"<b>{{ Trans('wts.bepatient') }}</b></p>
    </h3>
</div>
<br><br>
<div id="busy4" class="square">
</div>
<div id="result">
    <table width="100%" width="100%" border="0" cellpadding="0" cellspacing="0"
           class="table-bordered data_tables_wrapper">
        <th class="sorting_disabled" width="10%" align="center"
        {{ Trans('wts.language') }}</th>
        <th class="sorting_disabled" width="10%" align="center"
        ;># of files</th>
        <th class="sorting_disabled" width="10%" align="center"
        ;># of strings</th>
        <th class="sorting_disabled" width="20%" align="center"
        ;>Completeness</th>
        <th class="sorting_disabled" width="10%" align="center"
        ;># other files</th>
        <th class="sorting_disabled" width="30%" align="center"
        ;>Note</th>
        <th class="sorting_disabled" width="10%" align="center"
        ;>Process</th>
        <?php
        $rowclass = 0;
        foreach ($translations as $translation) {
            ?>
            <tr>
                <td class="rownh<?= $rowclass ?>"><b><? echo $translation->name ?></b></td>
                <td class="rownh<?= $rowclass ?>">
                    <div id="nof_<? echo $translation->name ?>">-</div>
                </td>
                <td class="rownh<?= $rowclass ?>">
                    <div id="nos_<? echo $translation->name ?>">-</div>
                </td>
                <td class="rownh<?= $rowclass ?>">
                    <div id="com_<? echo $translation->name ?>">-</div>
                </td>
                <td class="rownh<?= $rowclass ?>">
                    <div id="noof_<? echo $translation->name ?>">-</div>
                </td>
                <td class="rownh<?= $rowclass ?>">
                    <div id="note_<? echo $translation->name ?>"></div>
                </td>
                <td class="rownh<?= $rowclass ?>">
                    <div id="pro_<? echo $translation->name ?>">
                        <center><b>queued</b></center>
                    </div>
                </td>
            </tr>

            <?php
            $rowclass = 1 - $rowclass;
        }
        ?>
    </table>
    <p align="center" id="nextclick" style="display:none;"><br><b><a href='<?php echo route(
                'editupload', array('id' => $project->slug));?>' class='button radius'><i
                    class='icon-white icon-ok'></i> Proceed with the next step</a></b></p>
</div>