<h1>Test</h1>
<?php echo Form::open(array('url' => 'users/signin', 'class' => 'form-signin')); ?>
<h2 class="form-signin-heading">Please Login</h2>
<?php
echo Form::text('email', null, array('class' => 'input-block-level', 'placeholder' => 'Email Address'));
echo Form::password('password', array('class' => 'input-block-level', 'placeholder' => 'Password'));

echo Form::submit('Login', array('class' => 'btn btn-large btn-primary btn-block'));
echo Form::close();
?>