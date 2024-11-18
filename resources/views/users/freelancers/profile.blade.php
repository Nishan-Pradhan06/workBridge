@extends('components.freelancer.side_nav') <!-- import the side nav from components -->
@extends('components.freelancer.freelan_nav') <!-- import the navigation from components -->
@section('content') <!--MAIN CONTENT STARTED -->


<link rel="stylesheet" href="{{ asset('css/freelancer.css') }}"> <!-- IMPORT CSS -->


<div class="main">
    @section('main') <!-- CONTENT STARTED AFTER SIDENAV -->
    <main class="main-content">
        <h3 class="heading">My Profile</h3>
        <div class="content-wrapper">
            <div class="content-header">
                <h5>Edit Profile</h5>
                <a href="" class="btn btn-primary">Update</a>
            </div>
            <form>
                <section>
                    <h3>User Information</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" value="{{ auth()->user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" id="email" value="{{ auth()->user()->email }}">
                        </div>
                    </div>
                </section>

                <section>
                    <h3>Contact Information</h3>
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label for="address">Address</label>
                            <input type="text" id="address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" value="New York">
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" id="country" value="United States">
                        </div>
                        <div class="form-group">
                            <label for="postalCode">Postal code</label>
                            <input type="text" id="postalCode" value="437300">
                        </div>
                    </div>
                </section>

                <section>
                    <h3>About Me</h3>
                    <div class="form-group">
                        <label for="aboutMe">About me</label>
                        <textarea id="aboutMe" rows="4">A beautiful Dashboard for Bootstrap 5. It is Free and Open Source.</textarea>
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