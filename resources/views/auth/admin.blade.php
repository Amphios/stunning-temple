@extends('app')

@section('content')

<h1>Admin</h1>

<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Add Gems to a user</h3>
    </div>
    <div class="panel-body">
        {!! Form::open(['url' => 'convertGems']) !!}

            <div class="form-group">
                {!! Form::label('addGemsUsername', 'Username') !!}
                {!! Form::text('addGemsUsername', null, ['class' => 'form-control']) !!}

                {!! Form::label('addGemsAmount', 'Amount:') !!}
                {!! Form::text('addGemsAmount', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add Gems', ['class' => 'btn btn-primary form-control']) !!}
            </div>

        {!! Form::close() !!}
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Add Money to a user</h3>
    </div>
    <div class="panel-body">
        {!! Form::open(['url' => 'convertGems']) !!}

            <div class="form-group">
                {!! Form::label('addMoneyUsername', 'Username:') !!}
                {!! Form::text('addMoneyUsername', null, ['class' => 'form-control']) !!}

                {!! Form::label('addMoneyAmount', 'Amount:') !!}
                {!! Form::text('addMoneyAmount', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add Money', ['class' => 'btn btn-primary form-control']) !!}
            </div>

        {!! Form::close() !!}
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Add Stars to a user</h3>
    </div>
    <div class="panel-body">
        {!! Form::open(['url' => 'convertGems']) !!}

            <div class="form-group">
                {!! Form::label('addStarsUsername', 'Username:') !!}
                {!! Form::text('addStarsUsername', null, ['class' => 'form-control']) !!}

                {!! Form::label('addStarsAmount', 'Amount:') !!}
                {!! Form::text('addStarsAmount', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add Stars', ['class' => 'btn btn-primary form-control']) !!}
            </div>

        {!! Form::close() !!}
    </div>
</div>



@endsection