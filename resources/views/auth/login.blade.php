<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/login.css') }}">
    <style>
        .alert {
            position: relative;
            margin-top: 10px;
            transition: opacity 0.2s ease-out;
        }

        .error-message {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="login-form" action="/login" method="post">
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">
            </div>
            @error('email')
            <span class="error-message">{{ $message }}</span>
            <br>
            @enderror
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
            </div>
            @error('password')
            <span class="error-message">{{ $message }}</span>
            @enderror
            <div class="input-group">
                <button type="submit">Login</button>
            </div>
            <!-- Sign-up link -->
            <div class="input-group">
                <p>Don't have an account? <a href="{{route('get-started')}}">Sign up</a></p>
            </div>
            <!-- Success Alert -->
            @if(session('success'))
            <div class="alert alert-success" style="color: green; background-color: #d4edda; padding: 10px; border-radius: 5px;">
                {{ session('success') }}
            </div>
            @endif

            <!-- Error Alert -->
            @if(session('error'))
            <div class="alert alert-danger" style="color: red; background-color: #f8d7da; padding: 10px; border-radius: 5px;">
                {{ session('error') }}
            </div>
            @endif

        </form>
    </div>

    <script>
        // Automatically remove alerts after 10 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.opacity = '0'; // Fade out
                setTimeout(() => alert.remove(), 10); // Remove after fade out
            });
        }, 2000); // 10 seconds
    </script>
</body>

</html>