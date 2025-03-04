<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Registration Form</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/signup.css') }}">
    <style>
        .alert {
            position: relative;
            margin-top: 10px;
            transition: opacity 0.2s ease-out;
            padding: 10px;
            border-radius: 5px;
        }

        .alert-success {
            color: green;
            background-color: #d4edda;
        }

        .alert-danger {
            color: red;
            background-color: #f8d7da;
        }
    </style>
</head>

<body>
    <div class="container">
        <form id="client-registration-form" action="/client-register" method="POST">
            @csrf
            <h1>Client Registration</h1>
            <section>
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Full Name" required>
                @error('name')
                <span class="error-message">{{ $message }}</span>
                <br>
                @enderror

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="example@gmail.com" required>
                @error('email')
                <span class="error-message">{{ $message }}</span>
                <br>
                @enderror

                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="9800000000" required>
                @error('phone')
                <span class="error-message">{{ $message }}</span>
                <br>
                @enderror

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password Must be at least 8 characters." required>
                @error('password')
                <span class="error-message">{{ $message }}</span>
                @enderror

                <input type="hidden" name="role" value="client">
            </section>

            <!-- Success Alert -->
            @if(session('success'))
            <div class="alert alert-success" style="color: green; background-color: #d4edda; padding: 10px; border-radius: 5px;">
                {{ session('success') }}
            </div>
            @endif


            <!-- Error Alert -->
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script>
        // Automatically remove alerts after 2 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.opacity = '0'; // Fade out
                setTimeout(() => alert.remove(), 500); // Remove after fade out
            });
        }, 2000);
    </script>
</body>

</html>