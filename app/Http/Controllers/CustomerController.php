<?php


// app/Http/Controllers/CustomerController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\MilkDelivery;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    // Display the list of customers
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    // Show the edit form for a specific customer
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        // Validate data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8', // Make password optional
        ]);
    
        // Check if password was provided; if not, exclude it from the update array
        if ($request->filled('password')) {
            $validated['password'] = $request->password; // Use the provided password
        } else {
            // Remove 'password' key from $validated to avoid overwriting with null
            unset($validated['password']);
        }
    
        // Update customer data
        $customer->update($validated);
    
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }
    


    // Delete a customer
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
    }
    public function create()
    {
        return view('customers.create'); // This will look for a create.blade.php in resources/views/customers/
    }

    // Store new customer details
    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'password' => 'required|string|min:8', // Adding validation for password
    ]);

    // Create the new customer, including the password field
    Customer::create([
        'name' => $validatedData['name'],
        'phone' => $validatedData['phone'],
        'address' => $validatedData['address'] ?? null, // Allowing address to be nullable
        'email' => $validatedData['email'] ?? null, // Allowing email to be nullable
        'password' => $request->password, // Storing the plain password
    ]);

    // Redirect to the customers index page with a success message
    return redirect()->route('customers.index')->with('success', 'Customer added successfully.');
}

public function viewDeliveries()
{
    // Check if customer is logged in by session
    $customerId = Session::get('customer_id');
    
    // If no customer is logged in, redirect to login page
    if (!$customerId) {
        return redirect()->route('customer.login')->withErrors(['login' => 'Please log in to view your deliveries.']);
    }

    // Fetch deliveries for the logged-in customer using the correct model
    $deliveries = MilkDelivery::where('customer_id', $customerId)->get();

    // Pass deliveries to the view
    return view('customers.deliveries', compact('deliveries'));
}

}
