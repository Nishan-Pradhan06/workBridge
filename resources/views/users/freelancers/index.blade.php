@extends('components.freelancer.freelan_nav')
@section('content')
<div class="container">
    <div class="px-5">
        <br>
        <h3>Discover Jobs</h3>

        @if($jobPost->isEmpty())
        <h3>jobs are comming soon</h3>
        @else
        @foreach($jobPost as $jobPosts)
        <div class="card mb-4">
            <div class="card-header">
                <p style="font-size: 10px;">Posted {{ \Carbon\Carbon::parse($jobPosts->created_at)->diffForHumans() }}</p>
                <h5>{{ $jobPosts->title }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{!! str_replace(['{', '}'], '', $jobPosts->description) !!}</p>
                <p class="card-text">Duration: {{ $jobPosts->deadline }}</p>
                <p class="card-text">Budget: Rs. {{ $jobPosts->budget }}</p>
                <p class="card-text">Tech Stack: {{ $jobPosts->skills }}</p>
                <a href="{{ url('/apply/' . $jobPosts->id) }}" class="btn btn-success">Apply</a>
            </div>
        </div>

        @endforeach
        @endif
    </div>
    <!-- Pagination links with padding -->
    <div class="d-flex justify-content-center">
        {{ $jobPost->links('pagination::bootstrap-4') }}
    </div>
</div>
@include('components.footer')
@endsection