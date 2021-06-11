<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function Profile()
    {
        $adminData = Admin::find(1);
        return view('admin.admin-profile-view', compact('adminData'));
    }

    public function ProfileEdit()
    {
        $editData = Admin::find(1);
        return view('admin.admin-profile-edit', compact('editData'));
    }

    public function ProfileStore(Request $request)
    {
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($data->profile_photo_path && $request->file('profile_photo_path')) {
            @unlink(public_path('upload/admin-images/' . $data->profile_photo_path));
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/admin-images'), $filename);
            $data['profile_photo_path'] = $filename;
        } elseif ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/admin-images'), $filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();
        $notification = array(
            'message' => 'Admin profile updated successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    public function ChangePassword()
    {
        return view('admin.admin-password');
    }

    public function UpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Admin::find(1)->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        } else {
            return redirect()->back();
        }
    }
}
