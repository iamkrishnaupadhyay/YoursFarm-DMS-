<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;



class CustomerLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.customer_login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $customer = Customer::where('email', $credentials['email'])->first();

        // Check if the customer exists and the password matches (plain text comparison)
        if ($customer && $customer->password === $credentials['password']) {
            // Store customer information in session
            Session::put('customer_id', $customer->id);
            return redirect()->route('customer.deliveries');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
}