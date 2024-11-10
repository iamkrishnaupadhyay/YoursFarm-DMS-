@extends('layouts.app')

@section('content')
<style>
    h2 {
        text-align: center; /* Center the heading */
        color: #2c3e50; /* Heading color */
        margin-bottom: 20px; /* Space below heading */
    }

    form {
        max-width: 350px; /* Reduce form width */
        margin: 0 auto; /* Center the form */
        background-color: #fff; /* White background for the form */
        padding: 20px; /* Padding around form */
        border-radius: 8px; /* Rounded corners */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }

    label {
        display: block; /* Make labels block-level */
        margin-bottom: 5px; /* Space between label and input */
        color: #333; /* Label text color */
    }

    input[type="number"] {
        width: 100%; /* Full-width inputs */
        padding: 8px; /* Padding inside inputs */
        margin-bottom: 15px; /* Space between inputs */
        border: 1px solid #ddd; /* Border around inputs */
        border-radius: 5px; /* Rounded corners */
        box-sizing: border-box; /* Include padding in width */
    }

    .button-container {
        display: flex; /* Use flexbox for inline buttons */
        justify-content: space-between; /* Space between buttons */
        margin-top: 15px; /* Space above the button container */
    }

    button,
    .back-button {
        padding: 10px 15px; /* Padding for buttons */
        border: none; /* No border */
        border-radius: 5px; /* Rounded corners */
        cursor: pointer; /* Pointer on hover */
        font-weight: bold; /* Bold text */
        font-size: 14px; /* Font size */
        color: white; /* White text */
        text-decoration: none; /* Remove underline */
        transition: background-color 0.3s; /* Smooth transition */
        flex: 1; /* Make buttons flex to take equal space */
        margin: 0 5px; /* Margin between buttons */
    }

    button {
        background-color: #3498db; /* Primary button color */
    }

    button:hover {
        background-color: #2980b9; /* Darker shade on hover */
    }

    .back-button {
        background-color: #95a5a6; /* Secondary button color */
    }

    .back-button:hover {
        background-color: #7f8c8d; /* Darker shade on hover */
    }
</style>

<h2>Add Delivery for {{ $customer->name }}</h2>

<form action="{{ route('deliveries.store', $customer->id) }}" method="POST">
    @csrf

    <label for="quantity">Quantity (liters):</label>
    <input type="number" name="quantity" step="0.01" required>

    <label for="fat_percentage">Fat Percentage (%):</label>
    <input type="number" name="fat_percentage" step="0.01" required>

    <label for="price_per_liter">Price per Liter:</label>
    <input type="number" name="price_per_liter" step="0.01" required>

    <div class="button-container">
        <button type="submit">Add Delivery</button>
        <a href="{{ route('deliveries.index', $customer->id) }}" class="back-button">Back to Deliveries</a>
    </div>
</form>
@endsection
