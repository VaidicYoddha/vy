<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function myprofile()
    {
        return view('front.user.profile');
    }

    public function profileupdate(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        $user->name = $request->input('name');

        $user->update();

        return redirect('/profile' )->with('success', 'Profile Updated Successfully.');



    }
}
