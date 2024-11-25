<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelancer Registration Form</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/signup.css') }}">
    <style>
        .alert {
            position: relative;
            margin-top: 10px;
            transition: opacity 0.2s ease-out;
        }
    </style>
</head>

<body>
    <div class="container">
        <form id="client-registration-form" action='/freelancer-register' method="post">
            <!-- Basic Information -->
            @csrf
            <h1>Freelancer Registration</h1>
            <section>
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <input type="hidden" name="role" value="freelancer">
            </section>
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
            <button type="submit" class="btn btn-primary">Create my account</button>
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