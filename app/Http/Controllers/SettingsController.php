<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UploadAvatarRequest;

use App\User;
use Redirect;
use Hash;
use Input;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('auth.settings', compact('user'));
    }

    public function updateSettings(SettingsRequest $request)
    {
        $username = $request->username;
        $email = $request->email;

        $user = Auth::user();

        if($username === $user->username && $email === $user->email) {
            return Redirect::back()->with('updateSuccessMessage', 'nothing to update');
        } else {
            $user->username = $username;
            $user->email = $email;
            $user->save();

            return Redirect::back()->with('updateSuccessMessage','success');
        }        
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
            $currentPassword = $request->currentPassword;

            $newPassword = Hash::make($request->newPassword);
            $newPasswordAgain = Hash::make($request->newPasswordAgain);

            $user = Auth::user();

            if (Hash::check($currentPassword, $user->password)) {
                    $user->password = $newPassword;
                    $user->save();

                    return Redirect::back()->with('updatePasswordMessage', 'password updated');
            } else {
                return Redirect::back()->with('updatePasswordMessage', 'incorrect password');
            }
    }

    public function uploadAvatar(UploadAvatarRequest $request)
    {
        if (Input::hasFile('image'))
        {
            $file = Input::file('image');
            $destinationPath =  base_path() . '/public/uploads/avatars/';
            $extension = $file->getClientOriginalExtension();
            $filename = str_random(20).".{$extension}";
            $upload_success = $file->move($destinationPath, $filename);

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();

            return Redirect::back()->with('uploadAvatarMessage', 'success');
        } else {
            print('failed');
        }
    }
}
