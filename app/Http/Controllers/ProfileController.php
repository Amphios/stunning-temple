<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;

class ProfileController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('user.profile', compact('user', 'userCurrency'));
    }
}
