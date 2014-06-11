<div class="widgetwrap">
    <div class="widget feature-posts">
        <h4 class="widgettitle">Marketplace</h4>
        <?php if (true) {
            ?>
            <table width="100%" style="font-size:1.0em;">
                <tr>
                    <td>
                        <div style="padding-top: -5px;">Rating</div>
                    </td>
                    <td>
                        <span
                            class="stars stars-<?= $search->appInfo['ratings']['average']; ?> title='Rated <?= $search->appInfo['ratings']['average']; ?> out of 5'">&nbsp;</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        Version
                    </td>
                    <td>
                        <?= $search->appInfo['current_version']; ?>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>
                        Type
                    </td>
                    <td>
                        <?= strtoupper($search->appInfo['premium_type']); ?><br/>
                    </td>
                </tr>
                <tr>
                </tr>
                <tr>
                    <td colspan="2">
                    </td>
                <tr>
                <tr>
                    <td colspan="2">
                        <center><a href="https://marketplace.firefox.com/app/<?= $search->appInfo['slug'] ?>"
                                   class="btn btn-success">Get it from Marketplace</a></center>
                    </td>
                <tr>
            </table>
        <?php } else { ?>
            <table>
                <tr>
                    <td colspan="2">
                        <center>
                            Sorry, couldn't find "<?= WtsHelper::limit_chars($this->projectname, 20) ?>" on Marketplace
                        </center>
                    </td>
                </tr>
            </table>
        <?php } ?>
    </div>
</div>
 