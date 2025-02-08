<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Response;
use App\Models\Comment;
use App\Models\Form;

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
        $totalResponses = Response::count();

        $totalStartups = Response::where('form_id', 1)->count();

        $sharedResponses = Comment::count();

        $approveResponse = Response::where('status', 'approved')->count();

        $recentActivities = Response::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalResponses',
            'totalStartups',
            'sharedResponses',
            'approveResponse',
            'recentActivities'
        ));
    }

    public function responses()
    {
        $responses = Response::all();
        return view('admin.responses', compact('responses'));
    }

    public function editForm()
    {
        $forms = Form::all();
        return view('admin.forms', compact('forms'));
    }

    public function viewForm($id)
    {
        $form = Form::findOrFail($id);

        return view('admin.editForm', compact('form'));
    }


    public function shared()
    {
        $guests = Comment::all();
        return view('admin.shared', compact('guests'));
    }

    public function sharedRespone($id)
    {
        $response = Response::with('answers.question.section')->findOrFail($id);

        return view('admin.sharedRespone', compact('response'));
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->currentPassword, Auth::user()->password)) {
            return back()->withErrors(['currentPassword' => 'Current password is incorrect.']);
        }

        $user = Auth::user();
        $user->password = Hash::make($request->newPassword);
        $user->save();

        return back()->with('success', 'Password successfully changed.');
    }

    public function viewResponse($id)
    {
        $response = Response::with(['answers.question.section', 'answers.proof'])->findOrFail($id);

        return view('admin.viewResponse', compact('response'));
    }




    public function approveResponse($id)
    {
        $response = Response::findOrFail($id);
        $response->status = 'approved';
        $response->save();

        return back()->with('success', 'Response approved!');
    }

    // Logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
