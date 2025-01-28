<?php

namespace App\Http\Controllers;

use App\Models\Startup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // View login Page
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password!');
        }
    }

    // Dashboard 
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // View Admin Profile
    public function adminProfile()
    {
        $admin = Auth::user();
        return view('admin.admin-profile', compact('admin'));
    }

    
    public function responses (){

        //  $responses = Startup::all(); 

        // return view ('admin.responses' , compact('responses'));
        return view ('admin.responses' );

    }

    public function settings () {
        return view('admin.settings');
    }

    public function shared ()
    {
        return view('admin.shared');
    }

    // Logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

   

}
