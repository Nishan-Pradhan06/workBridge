<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" href="favicon.png" type="image/png">
    <title>WorkBridge - Freelancing</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body{
            background-color: white;
        }
        .stats-section {
            background-color: #00A4EF;
            color: white;
            padding: 20px 0;
            overflow-x: hidden;
        }

        .stats-number {
            font-size: 2.5em;
            font-weight: bold;
        }

        .stats-label {
            font-size: 1em;
        }

        .stats-divider {
            border-right: 1px solid white;
        }

        .hero-sections {
            
            background-image: url(Rectangle.png);
            display: flex;
            align-items: center;
            justify-content: center;
            padding:10vh;
        }
        .ways{
            background-color: white;
            display: flex;
            padding: 5vh;
            margin: 5vh;
            /* box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); */
            border-radius: 1vh;
        }
        .ways img{
            width: 70vh;
            margin-left: 7vh;
        }
        .ways-text{
            margin-top: 3vh;
            text-align: right;
            align-items: right;
            margin-left: 30vh;

        }

        /* .details{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
        } */
    </style>
</head>

<body>
    <!-- navbar component -->
    @include('components.navigation_bar')

    <div class="hero-sections bg-light ">
        <div class="detail">
            <div class="col-lg-10 ">
                <h1 class="display-5 font-weight-bold text-dark">Are you Looking for Freelancers?</h1>
                <p class="mt-3 lead text-muted">
                    Hire Great Freelancers, Fast. Spacelance helps you hire elite freelancers at a moment's notice.
                </p>
            </div>
            <div class="text-left">
                <a href="/get-started" class="btn btn-primary btn-lg active " role="button" aria-pressed="true">Hire Freelacner</a>
            </div>

        </div>
        <div class="banner">
            <lottie-player
                src="https://lottie.host/7a77e23a-99ef-48cf-93a7-bacc2358c156/DPjzPgiwZn.json"
                background="transparent"
                speed="1"
                style="width: 500px; height: 500px"
                loop
                autoplay
                direction="1"
                mode="normal">
            </lottie-player>
        </div>
    </div>
    <!-- hero section ends here -->

    <div class="ways">
        <div class="ways-image">
        <img src="landingGirl.png" alt="">
        </div>

        <div class="ways-text">
            <h1>Find The Best <br><span style="color:blue;">Freelancers</span> Here</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis veniam perferendis animi voluptatum dolorum hic, porro et vitae. Quam corrupti sint incidunt accusamus asperiores quisquam officiis est sapiente quod odit?</p>


        </div>
        
    </div>


    <!-- statatics started here -->
    <h2 class="text-center my-4">Our Platform's Achievements</h2>
    <div class="container-fluid stats-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 stats-divider">
                    <div class="stats-number">1200</div>
                    <div class="stats-label">PROJECTS COMPLETED</div>
                </div>
                <div class="col-md-3 stats-divider">
                    <div class="stats-number">500+</div>
                    <div class="stats-label">REGISTERED FREELANCERS</div>
                </div>
                <div class="col-md-3 stats-divider">
                    <div class="stats-number">900</div>
                    <div class="stats-label">SATISFIED CLIENTS</div>
                </div>
                <div class="col-md-3">
                    <div class="stats-number">10</div>
                    <div class="stats-label">YEARS IN OPERATION</div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/@lottiefiles/lottie-player@2.0.8/dist/lottie-player.js"></script>
    <!-- footer components -->
    @include('components.footer')
</body>

</html>
