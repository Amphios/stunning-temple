<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transactions;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {

		$users = User::all();
        $transactions = Transactions::all()->sortByDesc('created_at')->take(20);

        return view('home', compact('users', 'transactions'));
    }
}
