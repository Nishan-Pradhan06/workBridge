<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkBridge - Freelancing Site</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #007BFF;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo h1 {
            color: #fff;
            margin: 0;
        }

        header .nav-buttons {
            display: flex;
            gap: 10px;
        }

        header .nav-buttons .login-btn,
        header .nav-buttons .signup-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            background-color: #0056b3;
            transition: background-color 0.3s ease;
        }

        header .nav-buttons .signup-btn {
            background-color: #28a745;
        }

        header .nav-buttons .login-btn:hover,
        header .nav-buttons .signup-btn:hover {
            background-color: #004085;
        }

        header .nav-buttons .signup-btn:hover {
            background-color: #218838;
        }

        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .welcome-section {
            text-align: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .welcome-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .welcome-section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .welcome-section .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .welcome-section .cta-buttons .login-btn,
        .welcome-section .cta-buttons .signup-btn {
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            background-color: #0056b3;
            transition: background-color 0.3s ease;
        }

        .welcome-section .cta-buttons .signup-btn {
            background-color: #28a745;
        }

        .welcome-section .cta-buttons .login-btn:hover,
        .welcome-section .cta-buttons .signup-btn:hover {
            background-color: #004085;
        }

        .welcome-section .cta-buttons .signup-btn:hover {
            background-color: #218838;
        }

        .project-info {
            text-align: center;
            font-size: 1rem;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <h1>WorkBridge</h1>
            </div>
        </nav>
    </header>

    <main>
        <section class="welcome-section">
            <h2>Welcome to WorkBridge</h2>
            <p>Your bridge to freelancing success. Connect with clients, showcase your skills, and land your dream projects.</p>
            <div class="cta-buttons">
                <button class="login-btn">Login</button>
                <button class="signup-btn">Sign Up</button>
            </div>
        </section>
        <section class="project-info">
            <p>This is a college project built under the Laravel framework.</p>
            <p>Team Members: Nishan Pradhan and Nabin Basnet</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 WorkBridge. All rights reserved.</p>
    </footer>
</body>

</html>