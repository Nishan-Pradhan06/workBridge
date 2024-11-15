@extends('components.freelancer.side_nav') <!-- import the side nav from components -->
@extends('components.freelancer.freelan_nav') <!-- import the navigation from components -->
@section('content') <!--MAIN CONTENT STARTED -->


<link rel="stylesheet" href="{{ asset('css/freelancer.css') }}"> <!-- IMPORT CSS -->


<div class="main">
    @section('main') <!-- CONTENT STARTED AFTER SIDENAV -->
    <main class="main-content">
        <h3 class="heading">Contact Info</h3>
        <div class="content-wrapper">
            <form>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
</div>
<!-- footer import -->
@include('components.footer')
@endsection <!-- end section of main -->

@endsection <!-- end section of Content -->