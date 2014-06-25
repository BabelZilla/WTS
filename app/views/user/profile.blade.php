<div class="row">
    <div class="large-12 columns">
        <h3>Sorry, not complete... (yet)</h3>
    </div>
</div>
<php print_r($profile); ?>
<div class="row bump">
    <div class="small-12 large-9 columns">
        <div class="row">
            <div class="profile-card">
                <div class="small-12 large-4 columns text-center">
                    <?php echo Gravatar::image($user['email'], 'Some picture', array('width' => 100, 'height' => 100)); ?>
                </div>
                <div class="small-12 large-8 columns">
                    <h4>{{ $user['username'] }}
                        <span><?php echo $profile['title']; ?></span></h4>

                    <p><i class="fi-mail"></i><span></span></p>

                    <p><i class="fi-social-twitter"></i>&#64;{{ $profile['twitter'] }}</p>

                    <p><i class="fi-web"></i>{{ $profile['website'] }}></p>
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
            <h4 class="widgettitle" style="margin-top: 0px;">{{ Trans('profile.languages') }}</h4>
            <table width="100%" style="font-size:1.0em;">
                @foreach ($languages as $language)
                <tr>
                    <td>
                        <div style="padding-top: -5px;">{{ $language['language'] }}</div>
                    </td>
                    <td>
                            <span
                                class="stars stars-{{ $language['level'] }} title='Level {{ $language['level'] }}">&nbsp;</span>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<br/><br/>