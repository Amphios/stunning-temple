@extends('app')

@section('content')

    <div class="row">
        <div class="large-12 columns content-box">
            <h3>HOMEPAGE</h3>

            <p>
                Nullam dictum viverra nunc, eget facilisis erat consequat fringilla. Nam varius quam eget erat tempus euismod. Vivamus interdum neque vel libero auctor varius. Suspendisse non dolor in neque ullamcorper pretium sit amet eget enim. Maecenas eget sagittis nulla, vel tincidunt nisi. Fusce gravida sem orci, nec feugiat nisl feugiat et. Nullam pulvinar arcu purus. Aenean ac urna eget dui commodo venenatis at eget diam. Suspendisse justo tellus, aliquam in ex eget, convallis pulvinar purus.
            </p>
        </div>
    </div>

    <div class="row">
        <div class="large-12 columns content-box">
            <h3>USER LIST</h3>

            <ul>
                @foreach ($users as $user)
                <li>
                    <img class="avatar" src="{{ $user->avatar }}">
                    <a href="/u/{{ $user->username }}">
                        {{ strtoupper($user->username) }}
                    </a>
                    @if($user->admin === 0)
                        <span class="admin-level">Standard User</span>
                    @elseif($user->admin === 1)
                        <span class="admin-level">Super User</span>
                    @elseif($user->admin === 2)
                        <span class="admin-level">Administrator</span>
                    @endif

                    <span class="right"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> {{ $user->updated_at }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="large-12 columns content-box">
        	@if(count($transactions) >= 1)
    	        <h1 class="no-border">LATEST CONVERSIONS</h1>
    		        <table class="table table-striped">
    		            <tr>
    		                <th>ID</th>
    		                <th>Type</th>
    		                <th>User</th>
    		                <th>Amount</th>
    		                <th>Value</th>
    		                <th>Result</th>
    		                <th>Result Value</th>
    		                <th>Date</th>
    		            </tr>
    		            @foreach($transactions as $transaction)
    		                <tr>
    		                    <td>{{ $transaction->id }}</td>
    		                    <td>{{ $transaction->status }}</td>
    		                    <td>{{ $transaction->username }}</td>
    		                    <td>{{ $transaction->amount }}</td>
    		                    <td>{{ $transaction->value }}</td>
    		                    <td>{{ number_format($transaction->result, 2) }}</td>
    		                    <td>{{ $transaction->result_value }}</td>
    		                    <td>{{ $transaction->created_at }}</td>
    		                </tr>
    	            @endforeach
    	        </table>
            @else
            	<h1>LATEST CONVERSIONS</h1>
    			<div class="alert alert-warning" role="alert">No records to display</div>
            @endif
        </div>
    </div>

    @include ('errors.list')

@stop
