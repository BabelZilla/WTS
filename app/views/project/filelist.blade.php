<script>
    var language = '{{ App::getlocale() }}'
</script>
<h3 class="wtstitle">{{ Trans('wts.files_to_translate') }}</h3>
<div class="row">
    <div class="large-12 columns">
        <table id="files">
            <thead align="left" valign="middle">
            <tr>
                <th>{{ Trans('wts.files') }}</th>
                <th>{{ Trans('wts.progress') }}</th>
                <th>{{ Trans('wts.completed') }}</th>
                <th>{{ Trans('wts.translated') }}</th>
                <th>{{ Trans('wts.missing') }}</th>
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