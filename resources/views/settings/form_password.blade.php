
<div class="form-group">
    {!! Form::label('currentPassword', 'Current Password') !!}
    {!! Form::password('currentPassword', '', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('newPassword', 'New Password') !!}
    {!! Form::password('newPassword', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('newPasswordAgain', 'New Password Again') !!}
    {!! Form::password('newPasswordAgain', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>