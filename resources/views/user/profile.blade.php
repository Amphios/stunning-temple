@extends('app')

@section('top_content')

    <div id="top_content">
        <div class="content_bar">
            <img class="content_bar avatar" src="{{ $user->avatar }}">
                <div class="content_bar_stats">
                    <div class="line-1"><strong>{{ strtoupper($user->username) }} {{ strtoupper($user->surname) }}</strong></div>
                    <div class="line-2">
                        @if($user->admin === 0)
                            Standard User
                        @elseif($user->admin === 1)
                            Super User
                        @elseif($user->admin === 2)
                            Administrator
                        @endif
                    </div>
                    <div class="line-3">
                        <span data-toggle="tooltip" data-placement="bottom" title="Pounds" class="glyphicon glyphicon-gbp" aria-hidden="true"></span>{{ number_format($user->money, 2) }}
                        <span style="margin: 0px 10px 0px 10px;">&middot;</span>
                        <span data-toggle="tooltip" data-placement="bottom" title="Gems" class="glyphicon glyphicon-tint" aria-hidden="true"></span> {{ $user->gems }}
                        <span style="margin: 0px 10px 0px 10px;">&middot;</span>
                        <span data-toggle="tooltip" data-placement="bottom" title="Stars" class="glyphicon glyphicon-star" aria-hidden="true"></span> {{$user->stars }}
                    </div>
                </div>
        </div>
    </div>


@stop

@section('content')
    <div class="col-md-12 col-style">
        <h1>CONVERT</h1>

            @if(Session::has('convertSuccessMessage'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ Session::get('convertSuccessMessage') }}
                </div>
            @endif

            @include ('errors.list')

            <div class="form_container">
                {!! Form::open(['url' => 'convertGems']) !!}

                    <div class="form-group">
                        {!! Form::label('gemsAmount', 'Amount of Gems to convert:') !!}
                        {!! Form::text('gemsAmount', null, ['class' => 'form-control']) !!}
                        <input type="hidden" value="{{ $user->id }}" name="id" id="id">
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Convert', ['class' => 'btn btn-primary form-control']) !!}
                    </div>

                {!! Form::close() !!}

            </div>
    </div>

@stop
