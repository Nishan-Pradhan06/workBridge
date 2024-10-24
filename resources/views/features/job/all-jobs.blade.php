@extends('components/clients/client_nav')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
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

    .dropdown-toggle::after {
        display: none !important;
        /* Hide the default arrow */
    }
</style>
<div class="container">
    <div class="px-5">
        <br>
        <h3>All Jobs</h3>

        @foreach($jobPost as $jobPosts)
        <div class="card mb-4 custom-card">
            <div class="card-header">
                <div class="left">
                    <h5><a href="http://">{{$jobPosts->title}}</a></h5>
                    <p style="font-size: 12px;">Created {{ \Carbon\Carbon::parse($jobPosts->created_at)->diffForHumans() }} by You</p>
                </div>
                <div class="mid">
                    <p style="font-size: 24px;">0</p>
                    <h6>Proposals</h6>
                </div>
                <div class="right">
                    <div class="right">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
                            <i class="fas fa-ellipsis-h icons" style="font-size: 20px;"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/edit/' . $jobPosts->id) }}">Edit</a>
                            <a class="dropdown-item" href="{{ url('/remove/' . $jobPosts->id) }}">Remove Posting</a>
                            <a class="dropdown-item" href="{{ url('/restore/' . $jobPosts->id) }}">Reuse Posting</a>
                            <a class="dropdown-item" href="/proposals">View Proposal</a>
                            <a class="dropdown-item" href="{{ url('/delete/' . $jobPosts->id) }}">Permanent Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection