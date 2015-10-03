@extends('app')

@section('content')

<h1>Admin</h1>

@if(Auth::user()->admin >= 1)

    <div class="col-md-12 col-style">
        <h1>ADD CURRENCY TO USER</h1>

         @if(Session::has('addCurrencySuccessMessage'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('addCurrencySuccessMessage') }}
            </div>
        @endif

        @include ('errors.list')

        <div class="form_container">
            {!! Form::open(['url' => '/currency/add']) !!}

                <div class="form-group">
                    {!! Form::label('username', 'Username') !!}
                    {!! Form::text('username', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('currency', 'Currency') !!}
                    {!! Form::select('currency', array('Gems' => 'Gems', 'Money' => 'Money', 'Stars' => 'Stars'), null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('amount', 'Amount') !!}
                    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Add Gems', ['class' => 'btn btn-primary form-control']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>



@endif


@endsection
