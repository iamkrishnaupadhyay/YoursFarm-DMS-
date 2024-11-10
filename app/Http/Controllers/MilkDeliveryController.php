<?php

// app/Http/Controllers/MilkDeliveryController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\MilkDelivery;

class MilkDeliveryController extends Controller
{
    // List all deliveries for a specific customer
    public function index(Customer $customer)
    {
        $deliveries = $customer->milkDeliveries;
        return view('deliveries.index', compact('customer', 'deliveries'));
    }

    // Show form to add a new delivery
    public function create(Customer $customer)
    {
        return view('deliveries.create', compact('customer'));
    }

    // Store a new delivery for a customer
    public function store(Request $request, Customer $customer)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'quantity' => 'required|numeric',
        'fat_percentage' => 'required|numeric',
        'price_per_liter' => 'required|numeric',
    ]);

    // Calculate total payment
    $totalPayment = $validatedData['quantity'] * $validatedData['price_per_liter'];

    // Create a new milk delivery for the customer
    $customer->milkDeliveries()->create([
        'date_time' => now(), // Automatically set the current date and time
        'quantity' => $validatedData['quantity'],
        'fat_percentage' => $validatedData['fat_percentage'],
        'price_per_liter' => $validatedData['price_per_liter'],
        'total_payment' => $totalPayment, // Store calculated total payment
    ]);

    return redirect()->route('deliveries.index', $customer->id)->with('success', 'Delivery added successfully');
}


}

