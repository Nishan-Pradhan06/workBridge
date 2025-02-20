@extends('components.clients.client_nav') <!--IMPORTING THE FILES FROM COMPOENTS/NAVBAR.BLADE.PHP-->
@section('title','Dashboard') <!--SETTINGUP THE TITLE-->
@section('content') <!--START THE CONTENT FROM HERE-->

<style>
    .container {
        margin-top: 20px;
    }

    .status-cotainer {
        display: flex;
        justify-content: space-between;
        margin: auto;
    }

    .status {
        align-items: center;
        display: flex;
        justify-content: center;
        padding: 0px;
    }

    .status .logo {
        width: 70px;
        height: 70px;

        border-radius: 10px;
    }

    .status .logo img {
        width: 70px;

    }

    .status .content {
        padding: 25px;

    }

    .content .text {
        opacity: 0.75;
        font-family: 'Arial', sans-serif;
        font-size: 16px;
        margin-top: 12px;
    }

    .content .num {
        font-family: 'Arial', sans-serif;
        font-size: 25px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    /* active projects */
    .project-status {
        margin: 50px 0;


    }

    .project-status-name {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.15);
        padding: 20px;
        border-radius: 20px;
    }

    .project-status-name .btn {
        padding: 15px;
    }

    .project-status-name .btn button {
        padding: 8px 25px;
        border-radius: 15px;
        color: blue;
    }

    .p-status-detail span {
        margin-right: 20px;

    }

    .proposal-detail {
        display: flex;
        gap: 10px;
    }

    .accept-btn button {
        background-color: blue;
        color: white;
        padding: 8px 25px;
        border-radius: 15px;
        border: none;

    }

    .decline-btn button {
        color: black;
        background-color: white;
        padding: 8px 25px;
        border-radius: 15px;

    }

    .price {
        text-align: center;
        justify-content: center;
    }

    .price p {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 20px;
        font-weight: 500;
    }
</style>

<body>
    <div class="container">
        @if (auth()->user()->status === 'suspended')
        <div class="alert alert-danger">
            Your account is suspended. You may not access some features.
        </div>
        @endif
        <!-- status section -->
        <div class="status-cotainer">

            <div class="status">
                <div class="logo">
                    <img src="{{asset('project.png')}}" alt="">
                </div>
                <div class="content">
                    <div class="text">
                        <p>Active Projects</p>
                    </div>
                    <div class="num">
                        <p>12</p>

                    </div>
                </div>

            </div>
            <div class="status">
                <div class="logo">
                    <img src="{{asset('pending.png')}}" alt="">
                </div>
                <div class="content">
                    <div class="text">
                        <p>Pending Proposals</p>
                    </div>
                    <div class="num">
                        <p> {{ $pendingProposalsCount }}</p>
                    </div>
                </div>
            </div>
            <div class="status">
                <div class="logo">
                    <img src="{{asset('spend.png')}}" alt="">
                </div>
                <div class="content">
                    <div class="text">
                        <p>Total Spent</p>
                    </div>
                    <div class="num">
                        <p>$24,500</p>
                    </div>
                </div>
            </div>
            <div class="status">
                <div class="logo">
                    <img src="{{asset('av-balance.png')}}" alt="">
                </div>
                <div class="content">
                    <div class="text">
                        <p>Available Balance</p>
                    </div>
                    <div class="num">
                        <p>$8,750</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- proposals -->
        <div class="project-status">
            <h2>Proposals</h2>
            @if($pendingProposals->isEmpty())
            <div class="alert alert-info">
                You have no pending proposals.
            </div>
            @endif
            @foreach($pendingProposals as $proposal)
            <div class="project-status-name">
                <div class="text">
                    <div class="head">
                        <p>{{ $proposal->job->title }}</p> <!-- Job title -->
                    </div>
                    <div class="p-status-detail">
                        <span>{{ $proposal->user->name }}</span> <!-- Freelancer name -->
                        <span>{{ $proposal->created_at->format('Y-m-d') }}</span> <!-- Proposal date -->
                    </div>
                </div>
                <div class="proposal-detail">
                    <div class="price">
                        <p>NPR:. {{ number_format($proposal->amount, 2) }}</p> <!-- Proposal price -->
                    </div>
                   
                        <form action="{{ route('proposals.accept', $proposal->id) }}" method="POST">
                            @csrf
                            <div class="accept-btn">
                                <button type="submit">Accept</button>
                            </div>
                        </form>
                        <form action="{{ route('proposals.reject', $proposal->id) }}" method="POST">
                            @csrf
                            <div class="decline-btn">
                                <button type="submit">Decline</button>
                            </div>
                        </form>
                    
                </div>
            </div>
            @endforeach

        </div>
        <!-- active projects -->
        <!-- <div class="project-status">
            <h2>Active Projects</h2>
            <div class="project-status-name">
                <div class="text">
                    <div class="head">
                        <p>Mobile App Development</p>
                    </div>
                    <div class="p-status-detail">
                        <span>Due:2024-04-15</span>
                        <span>Budget: $5000</span>
                    </div>
                </div>
                <div class="btn">
                    <button>in progress</button>
                </div>
            </div>
        </div> -->

        <!-- completed projects -->
        <!-- <div class="project-status">
            <h2>Completed Projects</h2>
            <div class="project-status-name">
                <div class="text">
                    <div class="head">
                        <p>Brand Identity Design</p>
                    </div>
                    <div class="p-status-detail">
                        <span>Completed:2024-04-15</span>
                        <span>Budget: $3000</span>
                    </div>
                </div>
                <div class="btn">
                    <button>Invoice</button>
                </div>
            </div>

            <div class="project-status-name">
                <div class="text">
                    <div class="head">
                        <p>SEO Optimization</p>
                    </div>
                    <div class="p-status-detail">
                        <span>Completed:2024-04-15</span>
                        <span>Budget: $3000</span>
                    </div>
                </div>
                <div class="btn">
                    <button>Invoice</button>
                </div>
            </div>
        </div> -->


    </div>
    @include('components.footer')
    @endsection <!--END THE CONTENT FROM HERE-->