@extends('app')

@section('content')

	<h1>Home</h1>

	<ul>
		@foreach ($users as $user)
			<li><a href="/u/{{ $user->username }}">{{ $user->username }}</a></li>
		@endforeach
	</ul>



    @include ('errors.list')

@stop