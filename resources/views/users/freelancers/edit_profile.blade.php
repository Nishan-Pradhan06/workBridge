<!-- @extends('components.freelancer.side_nav') import the side nav from components -->
<!-- @extends('components.freelancer.freelan_nav') import the navigation from components -->
<!-- @section('content') MAIN CONTENT STARTED -->

<!-- <link rel="stylesheet" href="{{ asset('css/freelancer.css') }}"> IMPORT CSS -->

<!-- <div class="main"> -->
    <!-- @section('main') CONTENT STARTED AFTER SIDENAV -->
    <!-- <main class="main-content">
        <h3 class="heading">My Profile</h3>
        <div class="content-wrapper">

            <form action="{{ route('freelancer.edit_update', ['id' => $profile->id]) }}" method="post">
                @csrf
                <div class="content-header">
                    <h5>Edit Profile</h5>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <section>
                    <h3>User Information</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" value="{{ auth()->user()->name }}">
                        </div>
                    </div>
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="location" class="form-control" value="{{$profile->location }}">
                        </div>
                        <div class="form-group">
                            <label for="portfolio">Portfolio</label>
                            <input type="text" id="portfolio" name="portfolio" class="form-control" value="{{$profile->portfolio_link}}">
                        </div>
                        <div class="form-group">
                            <label for="hours_per_week">Hours Per Week</label>
                            <input type="text" id="hours_per" name="hoursPerWeek" class="form-control" value="NRP {{$profile->hours_per_week ?? 'N/A'}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job">Job</label>
                                <input type="text" id="job" name="jobTitle" class="form-control" value="{{$profile->job_title}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job_description">Job Description</label>
                                <input type="text" id="job_description" name="jobDesc" class="form-control" value="{{$profile->job_description ?? 'Beginner'}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="skill">Skill</label>
                                <input type="text" id="skill" name="skills" class="form-control" value="{{$profile->skills}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="skill_level">Level</label>
                                <select id="skill_level" name="skillLevel" class="form-select">
                                    <option value="beginner" {{ ($profile->skill_level ?? 'Beginner') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                    <option value="intermediate" {{ ($profile->skill_level ?? 'Beginner') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                    <option value="expert" {{ ($profile->skill_level ?? 'Beginner') == 'Expert' ? 'selected' : '' }}>Expert</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="aboutMe">About Me</label>
                        <textarea id="aboutMe" name="bio" class="form-control" rows="4">{{ $profile->bio ?? 'N/A' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="certification">Certification Image</label>
                        <input type="file" id="multipleFiles" name="certificationFiles[]" multiple accept="image/*,application/pdf" class="form-control">
                        <div>
                            @if($profile->certification_files)
                            @foreach(json_decode($profile->certification_files) as $certification)
                            <img src="{{ asset('storage/' . $certification) }}" alt="Certification Image" class="certification-img img-fluid" width="660" height="400">
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
</div> -->
<!-- footer import -->
<!-- @include('components.footer') -->
<!-- @endsection end section of main -->

<!-- @endsection end section of Content -->