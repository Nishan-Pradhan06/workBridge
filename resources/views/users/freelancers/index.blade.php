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

                <!-- Logic to differentiate between routes -->

                @if(request()->is('all-jobs')) <!--  yadi all-jobs vhane route hit hunxa vhane yo buttons khulxa-->
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
                @elseif(request()->is('find-job')) <!--  yadi find-jobs vhane route hit hunxa vhane yo buttons khulxa-->
                <!-- For "find-jobs", only show the Apply button for non-deleted jobs -->
                @if(!$jobPosts->deleted_at)
                <a href="{{ url('/apply/' . $jobPosts->id) }}" class="btn btn-success">Apply</a>
                @endif
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection