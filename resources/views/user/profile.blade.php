@extends('app')

@section('content')

    <h1>Profile</h1>

    {{ $user->username }}
    {{ $user->gems }}

    @include ('errors.list')

@stop