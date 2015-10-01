@extends('app')

@section('content')

    <h1>Profile</h1>

    {{ $user->username }}
    Gems: {{ $user->gems }}
    Pounds: {{ $user->money }}

    <!--
    <div class="container" style="background-color: lightgrey;">
		<div class="row">
			<div class="col-md-12">.col-md-8</div>
		</div>
	</div>
	-->

    @include ('errors.list')

@stop