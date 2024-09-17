<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>WorkBridge - Freelancing</title>
</head>

<body>
    <!-- navbar component -->
    @include('components.navigation_bar');

    <div class="bg-light pt-40">
        <section class="pt-12 pb-12 pb-sm-16 pt-lg-8">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-center text-lg-start ">
                        <h1 class="display-4 font-weight-bold text-dark">Kickstart Your Freelancing Career Today!</h1>
                        <p class="mt-3 lead text-muted">
                            Join thousands of developers and designers who have already started their freelancing journey on WorkBridge. Whether you're looking for short-term gigs or long-term projects, we connect you with clients worldwide and help you build a career on your own terms.
                        </p>
                        <div class="text-left">
                            <a href="#" class="btn btn-primary btn-lg active " role="button" aria-pressed="true">Get Started</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid" src="{{asset('hero.png')}}" alt="hero" />
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- footer components -->
    @include('components.footer');
</body>

</html>