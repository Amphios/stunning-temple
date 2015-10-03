<?php

namespace App\Http\Controllers;

use App\Transactions;
use App\User;
use App\Http\Requests;
use App\Http\Requests\convertFormRequest;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('user.profile', compact('user', 'userCurrency'));
    }

    public function convertGems(convertFormRequest $request)
    {

    	// Get user id from form
    	$id = $request->id;
    	$user = User::find($id);

    	// Get amount of gems to convert
		$gemsAmount = $request->gemsAmount;
		
		if ($user->gems >= $gemsAmount) {

			// Convert gems to money
			$converted = $gemsAmount / 100;
			
			// Saves new values in database
			$user->gems = $user->gems - $gemsAmount;
			$user->money = $user->money + $converted;
			$user->save();

            // Create transaction record
            $transaction = new Transactions;

            $transaction->user_id = $id;
            $transaction->username = $user->username;
            $transaction->status = 'CONVERT';
            $transaction->amount = $gemsAmount;
            $transaction->value = 'GEMS';
            $transaction->result = $converted;
            $transaction->result_value = 'POUNDS';
            $transaction->save();

			return Redirect::back()->with('convertSuccessMessage','You successfully converted ' . $gemsAmount . ' Gems to £' . number_format($converted,) . '!');

		} else {
			print('not enough funds');
		}

    }
}
