@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        color: #333;
    }

    h1 {
        color: #2c3e50;
        text-align: center; /* Center the heading */
        margin-bottom: 2px; /* Space below the customers list heading */
    }

    .table-container {
        margin-bottom: 10px; /* Space below the table */
        overflow-x: auto; /* Allow horizontal scrolling if needed */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px; /* Space between the table and buttons */
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #3498db;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #e1e1e1;
    }

    .btn {
    padding: 8px 12px; /* Adjust padding for smaller buttons */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 5px 0; /* Space between buttons vertically */
    display: inline-block; /* Ensure buttons align properly */
    font-size: 14px; /* Slightly smaller font size */
    color: white; /* Ensure text is white for contrast */
    font-weight: bold; /* Optional: make text bold */
    text-decoration: none; /* Ensure no underline on text */
    transition: background-color 0.3s; /* Smooth background transition */
}

.btn:hover {
    opacity: 0.9;
}

.btn-primary {
    background-color: #3498db;
}

.btn-secondary {
    background-color: #95a5a6;
}

.btn-danger {
    background-color: #e74c3c;
}

.btn-info {
    background-color: #16a085;
}

.btn-success {
    background-color: #27ae60;
}


    /* Ensure long text wraps properly */
    td {
        word-wrap: break-word;
        max-width: 200px; /* Set a max width for table cells */
    }

    .action-buttons {
        display: flex; /* Use flexbox for better alignment */
        flex-direction: column; /* Stack buttons vertically */
        gap: 5px; /* Space between rows */
    }

    .action-buttons .btn-row {
        display: flex; /* Use flex for button rows */
        justify-content: flex-start; /* Align buttons to the left */
        gap: 5px; /* Space between buttons in the same row */
    }
</style>

<h1>Customers List</h1>

<!-- Add Customer Button -->
<!-- Add Customer and Logout Buttons -->
<div style="text-align: left; margin-bottom: 5px; display: flex; gap: 10px;">
    <a href="{{ route('customers.create') }}" class="btn btn-primary">Add New Customer</a>
    
    <!-- Logout Button -->
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>

<div class="table-container">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->email }}</td>
                <td>
                    <div class="action-buttons">
                        <div class="btn-row">
                            <!-- Edit Button -->
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-secondary">Edit Customer</a>

                            <!-- Delete Button -->
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete Customer</button>
                            </form>
                        </div>
                        <div class="btn-row">
                            <!-- View Deliveries Link -->
                            <a href="{{ route('deliveries.index', $customer->id) }}" class="btn btn-info">View Deliveries</a>

                            <!-- Add Delivery Link -->
                            <a href="{{ route('deliveries.create', $customer->id) }}" class="btn btn-success">Add Delivery</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
