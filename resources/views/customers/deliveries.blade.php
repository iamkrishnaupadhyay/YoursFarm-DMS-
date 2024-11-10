@extends('layouts.app')

@section('content')
    <style>
        /* Your custom styles here */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .deliveries-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 1100px;
            margin: 0 auto;
        }

        h2 {
            font-size: 2rem;
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
        }

        .logout-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .logout-btn {
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        .deliveries-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .deliveries-table th, .deliveries-table td {
            padding: 12px 15px;
            text-align: left;
        }

        .deliveries-table th {
            background-color: #2980b9;
            color: white;
            font-size: 1.1rem;
        }

        .deliveries-table td {
            background-color: #ecf0f1;
            font-size: 1rem;
        }

        .deliveries-table tr:nth-child(even) td {
            background-color: #f9f9f9;
        }

        .deliveries-table td, .deliveries-table th {
            border: 1px solid #ddd;
        }

        .deliveries-table tbody tr:hover {
            background-color: #f1f1f1;
        }

        @media (max-width: 768px) {
            .deliveries-container {
                padding: 20px;
            }

            h2 {
                font-size: 1.5rem;
            }

            .deliveries-table th, .deliveries-table td {
                font-size: 0.9rem;
                padding: 8px 10px;
            }

            .logout-btn {
                font-size: 0.9rem;
            }
        }
    </style>

    <!-- Logout Button -->
    <div class="logout-container">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>

    <!-- Deliveries Table -->
    <div class="deliveries-container">
        <h2>Your Deliveries</h2>
        <table class="deliveries-table">
            <thead>
                <tr>
                    <th>Date & Time</th>
                    <th>Quantity (liters)</th>
                    <th>Fat %</th>
                    <th>Price per Liter</th>
                    <th>Total Payment</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deliveries as $delivery)
                    <tr>
                        <td>{{ $delivery->date_time }}</td>
                        <td>{{ $delivery->quantity }}</td>
                        <td>{{ $delivery->fat_percentage }}</td>
                        <td>{{ number_format($delivery->price_per_liter, 2) }}</td>
                        <td>{{ number_format($delivery->total_payment, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
