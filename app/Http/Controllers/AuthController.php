<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() 
    {
        return view('auth.login');
    }

    public function recoverPw()
    {
        return view('auth.recoverpw');  
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $result = Auth::attempt($credentials);
        if ($result) {
            $status = User::where('email',$request->email)->first();
            if ($status->user_status=='active') {
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            }else {
                return back()->withErrors([
                    'error' => 'user Locked',
                ]);
            }
        }
 
        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('login.form');
    }

    public function setting()
    {
        $title = "Account Setting";
        return view('auth.setting',compact('title'));
    }

    public function updateUser(Request $request)
    {
        $credentials = $request->validate([
            'update_first_name' => ['required'],
            'update_last_name' => ['required'],
            'update_email' => ['required'],
            'update_phone' => ['required','starts_with:078,0recentProperties79,072,073'],
            'update_user_name' => ['required'],
            'update_location' => ['required'],
        ]);

        $data = [
            'first_name' => $request->update_first_name,
            'last_name' => $request->update_last_name,
            'email' => $request->update_email,
            'user_telephone' => $request->update_phone,
            'user_name' => $request->update_user_name,
            'user_location' => $request->update_location,
        ];

        $affected = DB::table('users')
              ->where('user_id', Auth::user()->user_id)
              ->update($data);
        if ($affected) {
            return back()->withErrors([
                    'error' => 'Successfull information updated!!.',
                ]);
        }else{
            return back()->withErrors([
                    'error' => 'Fail to update information!!.',
                ]);
        }
    }
    public function updatePassword(Request $request)
    { 
            $request->validate([
                'old_password' => 'required',
                'password' => 'required|confirmed',
            ]);

            if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->withErrors([
                    'error1' => 'Your Old password is wrong.',
                ]);
            }

            User::where('user_id',auth()->user()->user_id)->update([
                'password' => Hash::make($request->password)
            ]);

            return back()->withErrors([
                'error1' => 'Successfull password updated!!.',
            ]);
    }
}
