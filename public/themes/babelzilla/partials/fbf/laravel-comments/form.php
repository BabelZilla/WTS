<?php echo Form::open(array('action' => array('Fbf\LaravelComments\CommentsController@create'), 'class' => 'form__comment'));

echo Form::hidden('return', Request::url());
echo Form::hidden('commentable', Crypt::encrypt(get_class($commentable) . '.' . $commentable->getKey()));
?>

    <div class="form--group<?php echo $errors->has('comment') ? ' form--group__error' : '' ?>">
        <?php echo Form::label('comment', trans('laravel-comments::messages.form.label')) ?>
        <?php echo Form::textarea('comment', Input::old('comment'), array('placeholder' => trans('laravel-comments::messages.form.placeholder'), 'required' => 'required')) ?>
        <?php if ($errors->has('comment')) { ?>
            <p class="form--error">
                <?php echo $errors->first('comment') ?>
            </p>
        <?php } ?>
    </div>

    <div class="form--group form--group__submit">
        <?php Form::submit(trans('laravel-comments::messages.form.submit'), array('class' => 'btn')) ?>
    </div>

<?php echo Form::close(); ?>