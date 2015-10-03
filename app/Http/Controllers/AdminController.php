<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;

use App\Http\Requests\addCurrencyRequest;

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

    public function addCurrency(addCurrencyRequest $request)
    {
        $username = $request->username;
        $currency = $request->currency;
        $amount = $request->amount;

        $id = DB::table('users')->where('username', $username)->pluck('id');
        $user = User::find($id);

        // Picks which currency was selected
        if($currency === 'Gems') {
            $user->gems = $user->gems + $amount;
        } else if($currency === 'Money') {
            $user->money = $user->money + $amount;
        } else if($currency === 'Stars') {
            $user->stars = $user->stars + $amount;
        } else {
            print('error');
        }

        // Saves new values in database
        $user->save();

        return Redirect::back()->with('addCurrencySuccessMessage', 'Successfully added ' . $amount. ' ' . $currency . ' to '. $username .'.')->with('flash_type', 'alert-danger');
    }
}
