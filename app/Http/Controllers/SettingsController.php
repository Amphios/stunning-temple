<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('auth.settings', compact('user'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $settings = User::findOrFail($user->id);

        return view('auth.settings', compact('settings', 'user'));
    }

    public function update($id, SettingsRequest $request)
    {

        $settings = User::findOrFail($id);

        $settings->update($request->all());

        return redirect('home');
    }
}
