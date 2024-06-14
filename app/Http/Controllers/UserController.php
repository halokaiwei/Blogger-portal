<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function userLogIn(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                Session::put('user', $user);
                return redirect('/home');
            }
            else {
                //Session::flash('error', 'LogIn Failed!! Wrong Email / Password!');
                //dd(session('error')); // Add this line to check if the error message is stored in the session
                $errorMessage = 'LogIn Failed!! Wrong Email / Password!';
                return view('userLogin')->with('errorMessage', $errorMessage);
            }

            throw ValidationException::withMessages(['email' => 'The provided credentials do not match our records.']);
        } catch (ValidationException $e) {
            return 'Exception';
        }
    }

    public function showAddUserForm()
    {
        return view('addUser');
    }

    public function addUser(Request $request)  //admin add user
    {
        // $validatedData = $request->validate([
        //     'user_name' => 'required',
        //     'user_email' => 'required',
        //     'user_pass' => 'required',
        // ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = new User();
        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->password = bcrypt($request->user_pass);
        $user->ip = "1";
        $user->confirm_code = "1";
        $user->save();

        return redirect('/admin/dashboard')->with('success', 'User added successfully!');
    }

    public function userRegister(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|max:255|confirmed',
        ]);

        // Create a new user instance
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')), // Hash the password
        ]);

        // Save the user to the database
        $user->save();

        // Redirect the user or return a response based on the context
        // For example:
        return redirect('/userLogin')->with('success', 'User registered successfully!');
    }

    public function deleteUser(Request $req)
    {
        // Validate the request data
        $req->validate([
            'id' => 'required|exists:users,id',
            'delete' => 'required|boolean',
        ]);

        // Retrieve the user ID from the request
        $userId = $req->input('id');

        // Delete the user from the database
        User::destroy($userId);

        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function profile() {
        return view('/profile');
    }

    public function logout(Request $request) {
        Auth::logout(); // Logout the authenticated user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token
        $request->session()->flush();

        return redirect('/userLogin'); // Redirect to the login page
    }


}
