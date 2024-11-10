<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
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
            background: linear-gradient(135deg, #6dd5ed, #2193b0); /* Gradient background */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 0 20px;
            overflow: hidden;
            background-size: cover;
        }

        /* Login Form Container */
        .login-container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px 35px;
            width: 100%;
            max-width: 450px;
            text-align: center;
            transform: translateY(-50px);
            animation: fadeInUp 0.6s ease-out forwards;
        }

        /* Header Styling */
        h2 {
            font-size: 2rem;
            color: #34495e;
            font-weight: 700;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Input Fields and Labels */
        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }

        label {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        input {
            width: 100%;
            padding: 14px;
            margin-bottom: 12px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 1rem;
            color: #333;
            background-color: #f7f9fc;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }

        input:focus {
            border-color: #3498db;
            outline: none;
            background-color: #ffffff;
        }

        input::placeholder {
            color: #aaa;
        }

        /* Submit Button */
        button {
            width: 100%;
            padding: 14px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        /* Error Message Styling */
        .error-message {
            color: #e74c3c;
            font-size: 1rem;
            margin-top: 15px;
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
                padding: 30px 25px;
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
        <h2>Customer Login</h2>
        <form action="{{ route('customer.login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
            </div>

            <button type="submit">Login</button>

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="error-message">
                    {{ $errors->first() }}
                </div>
            @endif
        </form>
    </div>

</body>
</html>
