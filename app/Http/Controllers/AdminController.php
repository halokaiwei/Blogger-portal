<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function addAdmin(Request $request)     {  //this is for checking purpose
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = new Admin();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/admin/login')->with('success', 'Admin added successfully!');
    }

    public function adminDashboard() {
        $users = User::all();
        $isAdminLoggedIn = Auth::guard('admin')->check(); // 检查管理员是否登录
        return view('adminDashboard', ['users' => $users, 'isAdminLoggedIn' => $isAdminLoggedIn]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); 
        $request->session()->invalidate();
        $request->session()->regenerateToken(); 

        return redirect('/admin/login'); 
    }
    public function adminLogIn(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();
            Session::put('admin', $admin);
            return redirect('/admin/dashboard');
        }
        else {
            Session::flash('error', 'LogIn Failed!! Wrong Username / Password!');
        }
        
        return redirect('/admin/login')->with('error', 'LogIn Failed!! Wrong Username / Password!');
    }

}
