@extends('components.freelancer.side_nav') <!-- import the side nav from components -->
@extends('components.freelancer.freelan_nav') <!-- import the navigation from components -->
@section('content') <!--MAIN CONTENT STARTED -->


<link rel="stylesheet" href="{{ asset('css/freelancer.css') }}"> <!-- IMPORT CSS -->


<div class="main">
    @section('main') <!-- CONTENT STARTED AFTER SIDENAV -->
    <main class="main-content">
        <h3 class="heading">Password And Security</h3>
        <div class="content-wrapper">
            <form>
                <div class="form-group">
                    <label for="currentpassword">Current Password</label>
                    <input type="password" class="form-control" id="currentpassword" value="{{ auth()->user()->password }}">
                    <small id="emailHelp" class="form-text text-muted">Enter the current password to change new password.</small>
                </div>
                <div class="form-group">
                    <label for="newpassword">New Password</label>
                    <input type="password" class="form-control" id="newpassword">
                </div>
                <div class="form-group">
                    <label for="confirmnewpassword">Confrim Password</label>
                    <input type="password" class="form-control" id="confirmnewpassword">
                </div>
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>
    </main>
</div>
<!-- footer import -->
@include('components.footer')
@endsection <!-- end section of main -->

@endsection <!-- end section of Content -->