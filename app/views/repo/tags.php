<h3>Tags</h3>

<table class="table table-striped table-bordered" id="tags" style="width: 100%">
    <thead>
    <tr>
        <th class="date">Date</th>
        <th class="branch">Tag</th>
        <th class="actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $tr_class = 'even';
    foreach ($page['tags'] as $tag) {
        $tr_class = $tr_class == "odd" ? "even" : "odd";
        echo "<tr class=\"$tr_class\">\n";
        echo "\t<td>$tag[date]</td>\n";
        echo "\t<td><a href=\"" . $git->makelink(
                array('a' => 'shortlog', 'p' => $page['project'], 'h' => $tag['fullname'])
            ) . "\">$tag[name]</a></td>\n";
        echo "\t<td></td>\n";
        echo "</tr>\n";
    }
    ?>
    </tbody>
</table>
 