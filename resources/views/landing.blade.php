<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        /* Global reset for margin, padding, and box-sizing */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body and general page styles */
        body {
            font-family: 'Georgia', serif;
            background: linear-gradient(135deg, #eef2f3, #c9d6e3); /* Soft gradient background */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }

        /* Central container for content */
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
            padding: 40px 60px;
            text-align: center;
            max-width: 600px;
            width: 100%;
        }

        /* Title styling */
        h1 {
            font-size: 2.5rem;
            font-weight: normal;
            color: #2a3d45;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        /* Subtitle styling */
        p {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 30px;
            font-style: italic;
        }

        /* Link (Login buttons) styling */
        a {
            display: inline-block;
            font-size: 1.1rem;
            font-weight: 500;
            text-decoration: none;
            padding: 12px 28px;
            margin: 10px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        /* Admin login button */
        a.admin {
            background-color: #1e2a38;
            color: #ffffff;
            border: 2px solid #1e2a38;
        }

        a.admin:hover {
            background-color: #344a61;
            transform: translateY(-3px);
            border-color: #344a61;
        }

        /* Customer login button */
        a.customer {
            background-color: #4a7c59;
            color: #ffffff;
            border: 2px solid #4a7c59;
        }

        a.customer:hover {
            background-color: #5f8d6b;
            transform: translateY(-3px);
            border-color: #5f8d6b;
        }

        /* Footer or small notes */
        .footer {
            font-size: 0.9rem;
            color: #999;
            margin-top: 20px;
            font-style: italic;
        }

        /* Responsive design for mobile */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            p {
                font-size: 1rem;
            }

            a {
                font-size: 1rem;
                padding: 10px 22px;
            }
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the YoursFarm Dairy</h1>
        <p>Select an option to log in:</p>
        <a href="{{ route('admin.login') }}" class="admin">Login as Admin</a>
        <a href="{{ route('customer.login') }}" class="customer">Login as Customer</a>
        <div class="footer">
            <p>Have a great day!</p>
        </div>
    </div>
</body>
</html>
