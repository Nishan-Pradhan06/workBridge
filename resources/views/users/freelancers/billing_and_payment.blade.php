@extends('components.freelancer.side_nav') <!-- import the side nav from components -->
@extends('components.freelancer.freelan_nav') <!-- import the navigation from components -->
@section('content') <!--MAIN CONTENT STARTED -->


<link rel="stylesheet" href="{{ asset('css/freelancer.css') }}"> <!-- IMPORT CSS -->


<div class="main">
    @section('main') <!-- CONTENT STARTED AFTER SIDENAV -->
    <main class="main-content">
        <h3 class="heading">Billing and Payment</h3>
        <div class="content-wrapper">
                <div class="header">
                    <h4 class="title">Add a billing method</h4>
                </div>
                <form class="radio-group">
                    <div class="radio-item">
                        <input type="radio" id="card" name="billing-method" value="card" />
                        <label for="card">
                            <span class="label-title">Payment card</span>
                            <p class="label-description">Visa, Mastercard, American Express, Discover, Diners</p>
                        </label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" id="khalti" name="billing-method" value="khalti" />
                        <label for="khalti">
                            <img src="{{asset('logo/khalti.png')}}" alt="khalti" class="khalti-logo">
                        </label>
                    </div>
                </form>
                <div class="btn">
                    <a href="" class="btn btn-primary">Add Method</a>
                </div>
        </div>
    </main>
</div>
<!-- footer import -->
@include('components.footer')
@endsection <!-- end section of main -->

@endsection <!-- end section of Content -->