@extends('components/clients/client_nav') <!-- IMPORT THE COMPONENTS -->

@section('content')
<style>
    .contract-container {
        display: flex;
        margin: 20px;
    }

    .container {
        max-width: 700px;
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
            <div class="job-details">
                <h2>Job Title: {{ $contractData['jobDetails']->title }}</h2> <!-- Job Title from database -->
                <p><strong>Proposed Budget:</strong> NPR: {{ $contractData['proposals'][0]->amount }}</p> <!-- Budget from database -->
                <p><strong>Delivery Time:</strong> {{ $contractData['proposals'][0]->project_duration }}</p> <!-- Delivery Time from database -->
                <h3>Proposal Description:</h3>
                <p>{{ $contractData['proposals'][0]->cover_letter ?? 'No description available.' }}</p> <!-- Description from proposal -->
            </div>
        </section>

        <section class="freelancer-info">
            <h2>Freelancer Information</h2>
            <p><strong>Name:</strong> {{$contractData['proposals'][0]->user->name}}</p> <!-- Freelancer Name -->
            <p><strong>Skills:</strong> {{$contractData['proposals'][0]->user->skill??'Not listed' }}</p> <!-- Freelancer Skills -->
            <p><strong>Portfolio:</strong> <a href="{{$contractData['proposals'][0]->user->portfolio_url ?? '#'}}" target="_blank">View Portfolio</a></p> <!-- Freelancer Portfolio URL -->
        </section>
    </div>

    <div class="container payment">
        <section class="proposal-details">
            <h2>Payment</h2>
            <p><strong>Total Amount:</strong> NPR: {{ $contractData['proposals'][0]->amount }}</p> <!-- Amount from proposal -->
            <!-- <p><strong>Charge:</strong> NPR: 5%</p>
            <p><strong>Total Amount:</strong> NPR: {{ $contractData['proposals'][0]->amount - ($contractData['proposals'][0]->amount * 0.05) }}</p> Total amount after 5% charge -->
        </section>

        @if (auth()->user()->status === 'suspended')
        <div class="alert alert-danger">
            Your account is suspended. You cannot access these features.
        </div>
        @elseif ($contractData['is_rejected'])
        <button class="btn btn-danger" disabled>Proposal Rejected</button> <!-- Show if rejected -->
        @elseif ($contractData['is_hired'])
        <button class="btn btn-secondary" disabled>Hired</button> <!-- Show if hired -->
        @else
        <form action="{{ route('payment.khalti') }}" method="POST" target="_blank">
            @csrf
            <input type="hidden" name="proposal_id" value="{{ $contractData['proposals'][0]->id }}">
            <input type="hidden" name="purchase_order_id" value="{{ $contractData['jobDetails']->id }}">
            <button type="submit" class="btn btn-primary" id="payment-button">Hire Freelancer</button>
        </form>
        @endif



        <!-- @if (auth()->user()->status === 'suspended')
        <div class="alert alert-danger">
            Your account is suspended. You cannot access these features.
        </div>
        @else
        <form action="{{ route('payment.khalti') }}" method="POST" target="_blank">
            @csrf -->

        <!-- <input type="hidden" name="freelancer_name" value="{{ $contractData['proposals'][0]->user->name }}"> -->
        <!-- <button type="submit" class="btn btn-primary" id="payment-button">Hire Freelancer</button>
        </form>
        @endif -->
    </div>
</div>
@include('components.footer')
@endsection