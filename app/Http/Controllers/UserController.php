<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Http\Requests\DetailUpdateRequest;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //
    public function detail()
    {
        $user = User::find(Auth::user()->id);
        return view('db-admin.profil.detail', compact('user'));
    }
    
    public function updateavatar(Request $request)
    {        
        $user = User::find(Auth::user()->id);

        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request->has('image')) {
            $path = $request->image->store('public/avatar');
        } else {
            $path = $user->image;
        }

        $user->image = $path;

        $user->update();

        if($request->oldimage) {
            Storage::delete($request->oldimage);
        }

        return redirect()->back()->with('status','Avatar changed successfully!');
    }

    public function destroyavatar(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if ( $user && $request->oldimage ){
            Storage::delete($request->oldimage);
        }

        $user->image = null;
        $user->update();

        return redirect()->back()->with('status','Avatar deleted successfully!');
    }

    public function changedetail()
    {
        $user = User::find(Auth::user()->id);
        return view('db-admin.profil.changedetail', compact('user'));
    }

    public function updatedetail(DetailUpdateRequest $request)
    {
        $user = User::find(Auth::user()->id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;
        $user->update();

        if (auth()->user()->is_admin == 1) {
            return redirect()->route('db-admin.detail')->with('status','User detail updated successfully!');
        } else {
            return redirect()->route('dashboard.detail')->with('status','User detail updated successfully!');
        }
    }

    public function updatepassword(Request $request)
    {
        $user = User::find(Auth::user()->id);
        
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        if( !(Hash::check($request->old_password, $user->password)) ) {
            return back()->with('status', 'Password lama kamu tidak sesuai!');
        }
        
        if(strcmp($request->get('old_password'), $request->get('password')) == 0){
            return back()->with('status', 'Password lama kamu tidak boleh sama dengan password baru!');
        } 

        $user->password = bcrypt($request->get('password'));

        $user->save();
        
        return redirect()->back()->with('status', 'Password kamu berhasil diubah');
    }
}
