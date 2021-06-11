<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index()
    {
        return view('frontend.index');
    }

    public function UserLogout()
    {
        Auth::logout();
        $notification = array(
            'message' => 'See you later',
            'alert-type' => 'success',
        );
        return redirect()->route('login')->with($notification);
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user-profile', compact('user'));
    }

    public function UserProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($user->profile_photo_path && $request->file('profile_photo_path')) {
            @unlink(public_path('upload/user-images/' . $user->profile_photo_path));
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/user-images'), $filename);
            $user['profile_photo_path'] = $filename;
        } elseif ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/user-images'), $filename);
            $user['profile_photo_path'] = $filename;
        }

        $user->save();
        $notification = array(
            'message' => 'User profile updated successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('dashboard')->with($notification);
    }

    public function UserPassword()
    {
        return view('frontend.profile.change-password');
    }

    public function UserPasswordUpdate(Request $request)
    {
        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'The password was updated',
                'alert-type' => 'success',
            );
            return redirect()->route('login')->with($notification);
        } else {
            return redirect()->back();
        }
    }
}
