<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('profile.index', [
            "title" => "Profile",
            'user' => $request->user(),
        ]);

    }//end metohd

    public function store(Request $request)
    {
        auth()->user()->update([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);


        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('img\profile'),$filename);
            $request->user()->avatar = $filename;
        }
        $request->user()->save();

        return redirect()->route('profile.index');

    }//end metohd

    public function changepassword()
    {
        return view('profile.partials.change-password', [
            "title" => "Change Password",
        ]);
    }

    public function updatepassword(Request $request)
    {
        $validateData = $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required',
            'renewPassword' => 'required|same:newPassword',

        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->currentPassword,$hashedPassword )) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newPassword);
            $users->save();

            session()->flash('success','Password Updated Successfully');
            return redirect()->back();

        } else{
            session()->flash('failed','Current password is not match');
            return redirect()->back();
        }
    }
}

