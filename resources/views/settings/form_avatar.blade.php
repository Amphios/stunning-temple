
<div class="form-group">
    {!! Form::label('image', 'Upload Avatar:') !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>