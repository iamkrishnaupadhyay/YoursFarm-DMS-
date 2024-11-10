@extends('layouts.app')

@section('content')
<style>
    h2 {
        text-align: center; /* Center the heading */
        color: #2c3e50; /* Heading color */
        margin-bottom: 20px; /* Space below heading */
    }

    table {
        width: 100%; /* Full width for the table */
        border-collapse: collapse; /* Merge borders */
        margin: 20px 0; /* Space above and below the table */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        background-color: #fff; /* White background for table */
    }

    th, td {
        padding: 12px; /* Padding inside cells */
        text-align: left; /* Align text to the left */
        border: 1px solid #ddd; /* Border for cells */
    }

    th {
        background-color: #3498db; /* Header background color */
        color: white; /* Header text color */
    }

    tr:nth-child(even) {
        background-color: #f2f2f2; /* Alternate row color */
    }

    tr:hover {
        background-color: #e1e1e1; /* Highlight row on hover */
    }

    .back-button {
        display: inline-block; /* Ensure it behaves like a button */
        margin: 20px auto; /* Center the button with margin */
        padding: 10px 15px; /* Button padding */
        background-color: #95a5a6; /* Button color */
        color: white; /* Button text color */
        border: none; /* No border */
        border-radius: 5px; /* Rounded corners */
        text-decoration: none; /* Remove underline */
        font-weight: bold; /* Bold text */
        transition: background-color 0.3s; /* Smooth transition */
    }

    .back-button:hover {
        background-color: #7f8c8d; /* Darker shade on hover */
    }
</style>

<h2>Deliveries for {{ $customer->name }}</h2>

@if($deliveries->isEmpty())
    <p style="text-align: center;">No deliveries found for this customer.</p>
@else
    <table>
        <tr>
            <th>Date</th>
            <th>Quantity (liters)</th>
            <th>Fat %</th>
            <th>Price per Liter</th>
            <th>Total Payment</th>
        </tr>
        @foreach($deliveries as $delivery)
            <tr>
                <td>{{ $delivery->date_time }}</td>
                <td>{{ $delivery->quantity }}</td>
                <td>{{ $delivery->fat_percentage }}</td>
                <td>{{ $delivery->price_per_liter }}</td>
                <td>{{ $delivery->total_payment }}</td>
            </tr>
        @endforeach
    </table>
@endif

<a href="{{ route('customers.index') }}" class="back-button">Back to Customers</a>
@endsection
