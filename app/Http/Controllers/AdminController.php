<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;

use App\Http\Requests\addGemsRequest;
use App\Http\Requests\addMoneyRequest;
use App\Http\Requests\addStarsRequest;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('auth.admin');
    }

    public function addGems(addGemsRequest $request)
    {
        $username = $request->addGemsUsername;
        $amount = $request->addGemsAmount;

        $id = DB::table('users')->where('username', $username)->pluck('id');
        $user = User::find($id);

        // Saves new values in database
        $user->gems = $user->gems + $amount;
        $user->save();

        return Redirect::back()->with('addGemsSuccessMessage','You successfully added ' . $amount . ' Gems to ' . $username . '!');
    }

    public function addMoney(addMoneyRequest $request)
    {
        $username = $request->addMoneyUsername;
        $amount = $request->addMoneyAmount;

        $id = DB::table('users')->where('username', $username)->pluck('id');
        $user = User::find($id);

        // Saves new values in database
        $user->money = $user->money + $amount;
        $user->save();

        return Redirect::back()->with('addMoneySuccessMessage','You successfully added £' . $amount . ' to ' . $username . '!');
    }

    public function addStars(addStarsRequest $request)
    {
        $username = $request->addStarsUsername;
        $amount = $request->addStarsAmount;

        $id = DB::table('users')->where('username', $username)->pluck('id');
        $user = User::find($id);

        // Saves new values in database
        $user->stars = $user->stars + $amount;
        $user->save();

        return Redirect::back()->with('addStarsSuccessMessage','You successfully added ' . $amount . ' Stars to ' . $username . '!');
    }
}
