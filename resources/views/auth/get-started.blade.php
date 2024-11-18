<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Started</title>
    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/components/get-started.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <a class="navbar-brand" href="/">
        <img src="{{asset('logo.png')}}" alt="logo" class="logo">
    </a>
    <div class="container mt-5">
        <!-- Logo Section -->

        <div class="text-center mb-4">
            <h1 class="display-4">Welcome to WorkBridge</h1>
            <p class="lead">Choose your role to sign in</p>
        </div>
        <div class="row justify-content-center">
            <!-- Client Section -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card client shadow-lg custom-card">
                    <div class="card-body text-center">
                        <h2 class="card-title">Client</h2>
                        <p class="card-text">Post jobs, find top
                            freelancers, and grow your business.</p>
                        <a href="/client-register" class="btn btn-success w-100">Join as a
                            Client</a>
                    </div>
                </div>
            </div>
            <!-- Freelancer Section -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card freelancer shadow-lg custom-card">
                    <div class="card-body text-center">
                        <h2 class="card-title">Freelancer</h2>
                        <p class="card-text">Find jobs, grow your skills,
                            and get hired by top companies.</p>
                        <a href="/signup-freelancer" class="btn btn-primary w-100">Apply as a
                            Freelancer</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>