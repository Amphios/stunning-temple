<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transactions;
use App\User;
use App\Child;

use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
    	if (Auth::check()){
    		$children = Child::where('user_group', '=', Auth::user()->user_group)->get();
    	}

		$users = User::all();
        $transactions = Transactions::all()->sortByDesc('created_at')->take(20);

        return view('home', compact('users', 'transactions', 'children'));
    }
}
