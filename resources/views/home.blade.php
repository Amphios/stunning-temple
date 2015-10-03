@extends('app')

@section('content')

    <div class="col-md-12 col-style">
        <h1>HOMEPAGE</h1>

        <p>
            Nullam dictum viverra nunc, eget facilisis erat consequat fringilla. Nam varius quam eget erat tempus euismod. Vivamus interdum neque vel libero auctor varius. Suspendisse non dolor in neque ullamcorper pretium sit amet eget enim. Maecenas eget sagittis nulla, vel tincidunt nisi. Fusce gravida sem orci, nec feugiat nisl feugiat et. Nullam pulvinar arcu purus. Aenean ac urna eget dui commodo venenatis at eget diam. Suspendisse justo tellus, aliquam in ex eget, convallis pulvinar purus.
        </p>
    </div>

    <div class="col-md-12 col-style">
        <h1>USER LIST</h1>
            <ul>
                @foreach ($users as $user)
                <li>
                    <img class="user-list-img" src="{{ $user->avatar }}">
                    <a href="/u/{{ $user->username }}">
                        {{ strtoupper($user->username) }} {{ strtoupper($user->surname) }}
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

    <div class="col-md-12 col-style">
        <h1 class="no-border">LATEST CONVERSIONS</h1>
        <table class="table table-striped">
            <tr>
                <th>#</th>
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
    </div>

    @include ('errors.list')

@stop
