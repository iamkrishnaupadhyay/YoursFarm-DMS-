@extends('layouts.app')

@section('content')
<style>
    h2 {
        text-align: center; /* Center the heading */
        color: #2c3e50; /* Heading color */
        margin-bottom: 20px; /* Space below heading */
    }

    form {
        max-width: 400px; /* Limit form width */
        margin: 0 auto; /* Center the form */
        background-color: #fff; /* White background for the form */
        padding: 20px; /* Padding around form */
        border-radius: 8px; /* Rounded corners */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }

    label {
        display: block; /* Make labels block-level */
        margin-bottom: 5px; /* Space between label and input */
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%; /* Full-width inputs */
        padding: 10px; /* Padding inside inputs */
        margin-bottom: 15px; /* Space between inputs */
        border: 1px solid #ddd; /* Border around inputs */
        border-radius: 5px; /* Rounded corners */
        box-sizing: border-box; /* Include padding in width */
    }

    .button-container {
        display: flex; /* Use flexbox for buttons */
        justify-content: space-between; /* Space buttons evenly */
        margin-top: 10px; /* Space above buttons */
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

<h2>Add New Customer</h2>

<form action="{{ route('customers.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>
    </div>

    <div>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address">
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>

    <div class="button-container">
        <button type="submit">Add Customer</button>
        <a href="{{ route('customers.index') }}" class="back-button">Back to Customers</a>
    </div>
</form>
@endsection
