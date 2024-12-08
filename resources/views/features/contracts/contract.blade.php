@extends('components/clients/client_nav') <!--IMPORT THE COMPONENTS-->
@section('content')
<style>
    .contract-container {
        display: flex;
        margin: 20px;
        /* max-width: 600px; */
    }

    .container {
        max-width: 700px;
        /* margin: 30px auto; */
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        padding: 25px;
    }

    section {
        margin-bottom: 30px;
    }

    section h2 {
        font-size: 1.8rem;
        color: #0056b3;
        border-bottom: 2px solid #0056b3;
        padding-bottom: 5px;
        margin-bottom: 15px;
    }

    section p {
        margin: 10px 0;
        font-size: 1rem;
    }

    .proposal-details {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
    }

    .proposal-details h3 {
        font-size: 1.5rem;
        color: #333;
        margin-top: 20px;
    }

    .freelancer-info {
        background-color: #f1f1f1;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #0056b3;
    }

    .payment {
        max-height: 400px;
    }
</style>

<div class="contract-container">
    <div class="container">
        <section class="proposal-details">
            @foreach ($jobPosts as $jobPost)


            <h2>Job Title:{{$jobPost->title}} </h2>
            @endforeach
            <p><strong>Proposed Budget:</strong> $</p> <!-- Budget from database -->
            <p><strong>Delivery Time:</strong> weeks</p> <!-- Delivery time from database -->
            <h3>Proposal Description:</h3>
            <p></p>
        </section>


        <section class="freelancer-info">
            <h2>Freelancer Information</h2>

            <p><strong>Name:</strong> {{Auth::user()->name}}</p> <!-- Assuming the user has a name field -->
            <p><strong>Skills:</strong></p> <!-- Freelancer skills -->
            <p><strong>Portfolio:</strong> <a href="" target="_blank">View Portfolio</a></p> <!-- Portfolio URL -->

        </section>
    </div>
    <div class="container payment">
        <section class="proposal-details">
            <h2>Payment</h2>
            <p><strong>Amount:</strong>NRP:1000</p>
            <p><strong>Charge:</strong>NPR:5%</p>
            <p><strong>Total Amount:</strong>NPR:1000</p>
        </section>

        <button type="submit" class="btn btn-primary">Hire</button>
    </div>
</div>
@include('components.footer')

@endsection