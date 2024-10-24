@extends('components/clients/client_nav')
@section('content')
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
                    @if($jobPosts->deleted_at)
                    <!-- Soft deleted, show restore and permanently delete options -->
                    <a href="{{ url('/restore/' . $jobPosts->id) }}" class="btn btn-success">Reuse Posting</a>
                    <a href="{{ url('/delete/' . $jobPosts->id) }}" class="btn btn-danger">Delete</a>
                    @else
                    <!-- Active job, show edit, soft delete, and delete options -->
                    <a href="{{ url('/edit/' . $jobPosts->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ url('/remove/' . $jobPosts->id) }}" class="btn btn-warning">Remove Posting</a>
                    <a href="{{ url('/delete/' . $jobPosts->id) }}" class="btn btn-danger">Delete</a>
                    @endif
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection