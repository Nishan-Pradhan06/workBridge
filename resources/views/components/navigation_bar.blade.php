<header class="bg-white header">
    <link rel="stylesheet" href="{{ asset('css/components/navbar.css') }}">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <img src="{{asset('logo.png')}}" alt="logo" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Works</a>
                </li>
            </ul>
            <div class="nab-btn">

                <a href="#" class="btn btn-outline-primary ml-auto d-none d-lg-block">Login</a>
                <a href="#" class="btn btn-primary ml-auto d-none d-lg-block">Sign Up</a>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light d-lg-none">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Works</a>
                </li>

            </ul>
            <div>
                <a href="#" class="btn btn-outline-primary mt-3 w-100">Login</a>
                <a href="#" class="btn btn-primary mt-3 w-100">Sign Up</a>
            </div>
        </div>
    </nav>
</header>