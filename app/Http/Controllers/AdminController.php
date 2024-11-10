<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Show the admin login form
    public function showLoginForm()
    {
        return view('auth.admin-login'); // Make sure this view exists
    }

    // Handle the admin login submission
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Hardcoded admin credentials
        if ($request->username === 'admin' && $request->password === 'admin123') {
            session(['is_admin' => true]); // Store admin session
            return redirect()->route('customers.index'); // Redirect to customer index
        }

        return back()->withErrors(['Invalid admin credentials']);
    }

    // Display the customer index page
    public function viewCustomers()
    {
        // Check if admin is logged in
        if (session()->get('is_admin')) {
            $customers = \App\Models\Customer::all(); // Retrieve customers
            return view('customers.index', compact('customers')); // Load customer index view with data
        }

        return redirect()->route('admin.login')->withErrors(['Please log in as admin to access this page']);
    }

    // Handle admin logout
    // public function logout()
    // {
    //     session()->forget('is_admin'); // Clear the admin session
    //     return redirect()->route('landing');
    // }
}
