<h1>Login</h1>

<!-- check for login error flash var -->

<?php if (Session::has('flash_error')) ;
{
    ?>
    <div id="flash_error"><?php echo Session::get('flash_error'); ?></div>
<?php
}

echo Form::open(array('url' => 'users/signin', 'class' => 'form-signin'));

echo Form::hidden('csrf_token', Session::getToken());
?>
<!-- username field -->

<p>
    <?php
    echo Form::label('email', 'Email');
    ?>
    <br/>
    <?php
    echo Form::text('email', Input::old('email'));
    ?>
</p>

<!-- password field -->
<p>
    <?php
    echo Form::label('password', 'Password');
    ?>
    <br/>
    <?php
    echo Form::password('password');
    ?>
</p>

<!-- submit button -->
<p>
    <?php
    echo Form::submit('Login');
    ?>
</p>
<?php
echo Form::close();
?>