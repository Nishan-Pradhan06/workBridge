@extends('components/clients/client_nav')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    /* for job not found css */
    .button {
        text-align: end;
    }

    .main {
        text-align: center;
        background-color: white;
        padding: 40px;
        border-radius: 8px;
        height: 60vh;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .no-job {
        margin-top: 20vh;
    }

    h2 {
        font-size: 24px;
        color: #333;
    }

    p {
        font-size: 18px;
        color: #666;
    }

    .main-part {
        height: 70vh;
    }

    /* ui for job post */
    .custom-card {
        cursor: pointer;
    }

    .custom-card:hover h5 a {
        text-decoration: underline;
        color: #3a445a;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .left a {
        color: black;
    }

    .mid {
        text-align: center;
    }

    .icons {
        font-size: 20px;
        color: black;
    }

    .right .dropdown-toggle::after {
        display: none !important;
        /* Hide the default arrow */
    }
</style>
<div class="container">
    <div class="px-5">
        <br>
        @if($jobPost->isEmpty())

        <div class=main>
            <div class="button">
                <a href="/job-post" class="btn btn-primary">Post a Job</a>
            </div>

            <div class="no-job">
                <h2>No Jobs Posted Yet</h2>
                <p>It looks like there are currently no job postings. You need to create a job!</p>
            </div>
        </div>

        <!-- add some ui here -->
        @else
        <h1>All Job Post</h1>

        @foreach($jobPost as $jobPosts)
        <div class="card mb-4 custom-card">
            <div class="card-header">
                <div class="left">
                    <h5><a href="http://">{{$jobPosts->title}}</a></h5>
                    <p style="font-size: 12px;">Created {{ \Carbon\Carbon::parse($jobPosts->created_at)->diffForHumans() }} by You</p>
                    @if($jobPosts->trashed())
                    <span class="badge bg-warning text-dark">Private</span>
                    @else
                    <span class="badge bg-success text-white">Public</span>
                    @endif
                </div>

                <div class="mid">
                    <!-- Safely check for the count -->

                    <p style="font-size: 24px;">{{ $jobPosts->jobProposals ? $jobPosts->jobProposals->count() : 0 }}</p>

                    <h6>Proposals</h6>
                </div>


                <div class="right">
                    <div class="right">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
                            <i class="fas fa-ellipsis-h icons" style="font-size: 20px;"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/edit/' . $jobPosts->id) }}">Edit</a>
                            @if($jobPosts->trashed())
                            <a class="dropdown-item" href="{{ url('/restore/' . $jobPosts->id) }}">Reuse Posting</a>
                            @else
                            <a class="dropdown-item" href="{{ url('/remove/' . $jobPosts->id) }}">Remove Posting</a>
                            @endif
                            <a class="dropdown-item" href="{{ url('/applicants/' . $jobPosts->id) }}">View Proposal</a>
                            <a class="dropdown-item" href="{{ url('/delete/' . $jobPosts->id) }}">Permanent Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@include('components.footer')
@endsection