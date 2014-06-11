<h2>Files to translate</h2>
<div class="row">
    <div class="large-12 columns">
        <table id="files">
            <thead align="left" valign="middle">
            <tr>
                <th>File</th>
                <th>Progress</th>
                <th>Completed</th>
                <th>Translated</th>
                <th>Missing</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($files as $file) {
                $TranslatedCount = TranslatedString::where('project_id', '=', $project->project_id)
                    ->where('language', '=', $language)
                    ->where('original_file', '=', $file->file_id)
                    ->count();
                $OriginalCount = $file->originalStrings()->count();
                if ($OriginalCount == 0) {
                    $percentageDone = 0;
                } else {
                    $percentageDone = intval($TranslatedCount / $OriginalCount * 100);
                }
                //$percentageDone = intval($TranslatedCount / $OriginalCount * 100);
                $percentageMissing = 100 - $percentageDone;
                $fp = str_replace('/en-US/', '/' . $language . '/', $file->file_path);
                ?>
                <tr>
                    <td>
                        <?php echo link_to_route('translatefile', $fp,
                            array('project' => $project->slug,
                                'language' => $language,
                                'file' => $file->file_id,
                                'show' => 'all',
                                'page' => 1
                            ), array()); ?>
                    </td>
                    <td>
                        <div class="nice round progress success"><span class="meter"
                                                                       style="width: <?php echo $percentageDone ?>%"></span>
                        </div>
                    </td>
                    <td><b>
                            <center><?php echo $percentageDone . " %" ?></center>
                        </b></td>
                    <td><?php echo $TranslatedCount; ?></td>
                    <td><?php echo $OriginalCount - $TranslatedCount; ?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table
    </div>
</div>
</div>