@extends('components/clients/client_nav')
@section('content')
<div class="container">
    <div class="px-5">
        <br>
        @if(request()->is('all-jobs'))
        <h3>All Jobs</h3>
        @else
        <h3>Discover Jobs</h3>
        @endif
        @foreach($jobPost as $jobPosts)
        <div class="card mb-4">
            <div class="card-header">
                <p style="font-size: 10px;">Posted {{ \Carbon\Carbon::parse($jobPosts->created_at)->diffForHumans() }}</p>
                <h5>{{$jobPosts->title}}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{$jobPosts->description}}</p>
                <p class="card-text">Duration: {{$jobPosts->deadline}}</p>
                <p class="card-text">Budget: Rs. {{$jobPosts->budget}}</p>
                <p class="card-text">Tech Stack: {{$jobPosts->skills}}</p>
                <a href="{{ url('/apply/' . $jobPosts->id) }}" class="btn btn-success">Apply</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection