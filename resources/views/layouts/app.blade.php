<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your Application')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Corrected line -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensures that the footer is always at the bottom */
        }

        /* Header Styles */
        header {
            background: linear-gradient(135deg, #3498db, #2980b9); /* Gradient background */
            color: white;
            padding: 15px 0;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            text-align: center;
            position: relative;
            z-index: 1;
            margin-bottom: 20px; /* Reduced space between header and content */
        }

        header h1 {
            font-size: 3rem;
            color: white;
            margin: 0;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: transform 0.3s ease-in-out;
        }

        header h1:hover {
            transform: scale(1.1); /* Hover effect for the title */
        }

        header i {
            font-size: 2rem;
            margin-right: 10px;
        }

        header .brand {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        /* Main Content Styles */
        main {
            padding: 40px 15px;
            flex-grow: 1; /* Ensures that the main content grows to fill space */
            text-align: center;
        }

        /* Footer Styles */
        footer {
            background-color: #2c3e50;
            color: white;
            padding: 30px 20px;
            text-align: center;
            position: relative;
            width: 100%;
            margin-top: 20px; /* Reduced space between footer and content */
        }

        .footer-content {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-description {
            font-size: 16px;
            color: #ccc;
            margin-bottom: 30px;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 40px;
        }

        .footer-links a {
            color: #ddd;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .footer-links a:hover {
            color: #3498db;
            transform: translateY(-5px); /* Hover effect */
        }

        .social-icons {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-icons a {
            color: white;
            font-size: 30px;
            transition: color 0.3s ease, transform 0.3s ease;
            padding: 10px;
            border-radius: 50%;
            border: 2px solid transparent;
        }

        .social-icons a:hover {
            color: #3498db;
            transform: scale(1.2);
            border-color: #3498db;
        }

        .footer-call-to-action {
            margin-top: 30px;
            background-color: #34495e;
            padding: 20px;
            border-radius: 10px;
        }

        .footer-call-to-action h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #fff;
        }

        .footer-call-to-action p {
            color: #bbb;
            margin-bottom: 20px;
        }

        .footer-call-to-action button {
            background-color: #3498db;
            border: none;
            padding: 10px 25px;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .footer-call-to-action button:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            header h1 {
                font-size: 2.5rem;
            }

            .footer-links {
                flex-direction: column;
                gap: 20px;
            }

            .social-icons a {
                font-size: 24px;
                padding: 8px;
            }

            .footer-call-to-action h3 {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="brand">
            <i class="fas fa-leaf"></i> <!-- Add a small icon next to the brand name -->
            <h1>YourFarm Dairy</h1>
        </div>
    </header>

    <!-- Main Content Area -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <p class="footer-description">&copy; {{ date('Y') }} YourFarm Dairy. Bringing you the freshest products directly from our farm to your door.</p>
            
            <!-- Footer Links -->
            <div class="footer-links">
                <a href="#">Home</a>
                <a href="#">About Us</a>
                <a href="#">Contact</a>
                <a href="#">Privacy Policy</a>
            </div>
            
            <div class="footer-call-to-action">
                <h3>Subscribe for the Latest Updates</h3>
                <p>Stay updated with new arrivals and exclusive offers from YourFarm Dairy.</p>
                <button>Subscribe Now</button>
            </div>

            <!-- Social Media Icons -->
            <div class="social-icons">
                <a href="#" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" aria-label="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" aria-label="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </footer>
</body>
</html>
