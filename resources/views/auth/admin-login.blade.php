<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #8e9eab, #eef2f3); /* Gradient background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 0 20px;
            color: #333;
        }

        /* Form Container */
        .login-container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 50px 40px;
            width: 100%;
            max-width: 450px;
            text-align: center;
            transform: translateY(-50px);
            animation: fadeInUp 0.6s ease-out forwards;
        }

        /* Heading */
        h2 {
            font-size: 2rem;
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 25px;
            letter-spacing: 1px;
        }

        /* Label Styling */
        label {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 8px;
            text-align: left;
            display: block;
        }

        /* Input Field Styling */
        input {
            width: 100%;
            padding: 15px;
            margin-bottom: 25px;
            border-radius: 10px;
            border: 1px solid #ddd;
            font-size: 1rem;
            color: #333;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #3498db;
            outline: none;
        }

        input::placeholder {
            color: #aaa;
        }

        /* Button Styling */
        button {
            width: 100%;
            padding: 15px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
            transform: translateY(-3px);
        }

        /* Error Message Styling */
        .error-message {
            color: #e74c3c;
            font-size: 1.1rem;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Animation for Form Entry */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
            }

            h2 {
                font-size: 1.7rem;
            }

            input, button {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Admin Login</h2>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Enter your username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>
