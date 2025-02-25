@extends('components.freelancer.side_nav') <!-- import the side nav from components -->
@extends('components.freelancer.freelan_nav') <!-- import the navigation from components -->
@section('content') <!-- MAIN CONTENT STARTED -->

<link rel="stylesheet" href="{{ asset('css/freelancer.css') }}"> <!-- IMPORT CSS -->

<div class="main">
    @section('main') <!-- CONTENT STARTED AFTER SIDENAV -->
    <main class="main-content">
        <h3 class="heading">My Profile</h3>
        <div class="content-wrapper">
            <div class="content-header">
                <h5>Edit Profile</h5>
                <!-- <a href="{{ route('freelancer.edit_profile', ['id' => $profile->id]) }}">Edit</a> -->
            </div>
            <form>
                <section>
                    <h3>User Information</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" class="form-control" value="{{ auth()->user()->name }}" readonly>
                        </div>
                    </div>
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label for="address">Address</label>
                            <input type="text" id="address" class="form-control" value="{{$profile->location }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="city">Portfolio</label>
                            <input type="text" id="city" class="form-control" value="{{$profile->portfolio_link}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="hours_per_week">Hours Per Week</label>
                            <input type="text" id="hours_per" class="form-control" value="NRP {{$profile->hours_per_week ?? 'N/A'}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job">Job</label>
                                <input type="text" id="job" class="form-control" value="{{$profile->job_title}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job_description">Job Description</label>
                                <input type="text" id="job_description" class="form-control" value="{{$profile->job_description ?? 'Begginer'}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="skill">Skill</label>
                                <input type="text" id="skill" class="form-control" value="{{$profile->skills}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="skill_level">Level</label>
                                <input type="text" id="skill_level" class="form-control" value="{{$profile->skill_level ?? 'Begginer'}}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="aboutMe">About Me</label>
                        <textarea id="aboutMe" class="form-control" rows="4" readonly>{{$profile->bio ?? 'N/A'}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="certification">Certification Image</label>
                        <div>
                            @if($profile->certification_files)
                            @foreach(json_decode($profile->certification_files) as $certification)
                            <img src="{{ asset('storage/' . $certification) }}" alt="Certification Image" class="certification-img" width="660" height="400">
                            @endforeach
                            @else
                            <p>No certification images uploaded.</p>
                            @endif
                        </div>
                    </div>

                </section>
            </form>
        </div>
    </main>
</div>
<!-- footer import -->
@include('components.footer')
@endsection <!-- end section of main -->

@endsection <!-- end section of Content -->