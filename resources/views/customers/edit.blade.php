@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        color: #333;
    }

    h2 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .button-container {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    button,
    .back-button {
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        font-size: 14px;
        color: white;
        text-decoration: none;
        transition: background-color 0.3s;
        flex: 1;
        margin: 0 5px;
    }

    button {
        background-color: #3498db;
    }

    button:hover {
        background-color: #2980b9;
    }

    .back-button {
        background-color: #95a5a6;
    }

    .back-button:hover {
        background-color: #7f8c8d;
    }
</style>

<h2>Edit Customer</h2>

<form action="{{ route('customers.update', $customer->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Use PUT method for update -->
    
    <label>Name:</label>
    <input type="text" name="name" value="{{ $customer->name }}" required>

    <label>Phone:</label>
    <input type="text" name="phone" value="{{ $customer->phone }}" required>

    <label>Address:</label>
    <input type="text" name="address" value="{{ $customer->address }}" required>

    <label>Email:</label>
    <input type="email" name="email" value="{{ $customer->email }}" required>

    <label>Password (leave blank to keep current):</label>
    <input type="password" name="password" placeholder="Enter new password (if any)">
    
    <div class="button-container">
        <button type="submit">Update Customer</button>
        <a href="{{ route('customers.index') }}" class="back-button">Back to Customers</a>
    </div>
</form>
@endsection
