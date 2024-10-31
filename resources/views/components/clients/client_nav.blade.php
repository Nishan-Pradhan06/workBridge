<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','WorkBridge')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            /* border: 2px solid #0f0; */
        }

        .profle-dropdown-toggle::after {
            display: none !important;
            /* Hide the default arrow */
        }

        .info h5 {
            margin-top: 10px;
            font-size: 15px;
        }

        .info p {
            font-size: 12px;
            text-align: center;
        }

        hr {
            margin-top: -10px;
            width: 150px;
        }

        .items {
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    <header class="bg-white header">
        <link rel="stylesheet" href="{{ asset('css/components/navbar.css') }}">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/">
                <img src="{{asset('logo.png')}}" alt="logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Jobs
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/job-post">Post a Job</a>
                            <a class="dropdown-item" href="/client/dashboard">Your Dashboard</a>
                            <a class="dropdown-item" href="/all-jobs">All Jobs Post</a>
                            <a class="dropdown-item" href="/contracts">All Contracts</a>
                        </div>
                    </li>
                </ul>
                <div class="nab-btn">
                    <a class="nav-link profle-dropdown-toggle profile" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
                        <img src="{{asset('profile.jpg')}}" alt="Profile Picture" class="profile-pic">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <div class="profile">
                            <img src="{{asset('profile.jpg')}}" alt="Profile Picture" class="profile-pic">
                            <div class="info">
                                <h5>Nishan Pradhan</h5>
                                <p>Client</p>
                            </div>
                            <hr>
                        </div>
                        <div class="items dropdown-item">
                            <i class="fas fa-user-circle icons" style="font-size: 20px;"></i>
                            <a class="dropdown-item" href="">Profile</a>
                        </div>
                        <div class="items dropdown-item">
                            <i class="fas fa-cog icons" style="font-size: 20px;"></i>
                            <a class="dropdown-item" href="">Setting</a>
                        </div>
                        <div class="items dropdown-item">
                            <i class="fas fa-sign-out-alt icons" style="font-size: 20px;"></i>
                            <a class="dropdown-item" href="">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-light d-lg-none">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/job-post">Post a Job</a>
                            <a class="dropdown-item" href="/client/dashboard">Post a Job</a>
                            <a class="dropdown-item" href="/all-jobs">All Jobs Post</a>
                            <a class="dropdown-item" href="/contracts">All Contracts</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="dropdown-divider"></div>
    @yield('content')

    @include('components.footer')
    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>