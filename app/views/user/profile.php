<div class="row">
    <div class="large-12 columns">
        <h2>Sorry, not complete... (yet)</h2>
    </div>
</div>
<div class="row bump">
    <div class="small-12 large-9 columns">
        <div class="row">
            <div class="profile-card">
                <div class="small-12 large-4 columns">
                    <?php echo Gravatar::image($user['email'], 'Some picture', array('width' => 100, 'height' => 100)); ?>
                </div>
                <div class="small-12 large-8 columns">
                    <h4><?php echo $profile['given_name'] . ' ' . $profile['name']; ?>
                        <span><?php echo $profile['title']; ?></span></h4>

                    <p><i class="fi-mail"></i><span><?php echo $user['email'] ?></span></p>

                    <p><i class="fi-social-twitter"></i>@<?php echo $profile['twitter'] ?></p>

                    <p><i class="fi-web"></i><?php echo $profile['website']; ?></p>
                </div>
                <div class="row collapse">
                    <ul class="button-group even-3">
                        <li><a href="#" class="button"> Projects <span><?php echo $projects ?> </span></a></li>
                        <li><a href="#" class="button"> Translations <span><?php echo $translations ?> </span></a></li>
                        <li><a href="#" class="button"> Views <span> 0 </span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="large-3 columns">
        <div class="widgetwrap">
            <h4 class="widgettitle" style="margin-top: 0px;">Languages</h4>
            <table width="100%" style="font-size:1.0em;">
                <?php foreach ($languages as $language) {
                    ?>
                    <tr>
                        <td>
                            <div style="padding-top: -5px;"><?php echo $language['language']; ?></div>
                        </td>
                        <td>
                            <span
                                class="stars stars-<?= $language['level']; ?> title='Level <?= $language['level']; ?>">&nbsp;</span>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<br/><br/>