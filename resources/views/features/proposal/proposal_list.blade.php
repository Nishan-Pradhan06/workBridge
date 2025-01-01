@extends('components/clients/client_nav') <!--IMPORT THE COMPONENTS-->
@section('content')
<style>
    .applicant-container {
        padding: 0 140px;
    }

    .headers {
        padding: 10px;
        font-weight: bold;
        color: #333;
    }

    .freelancer-card {
        width: 80vw;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;
        padding: 20px;
        margin: 10px 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .freelancer-info {
        display: flex;
        flex-direction: column;
        align-self: center;
        justify-content: end;
    }

    .profiles {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
    }

    .profile-pics {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        margin-bottom: 10px;
        /* border: 2px solid #0f0; */
    }


    .info h3 {
        margin: 5px 0;
        font-size: 16px;
        font-weight: bold;
    }

    .info p {
        margin: 2px 0;
        color: #666;
        font-size: 14px;
    }


    .stats,
    .qualifications,
    .rate-details {
        text-align: center;
    }

    .stats p,
    .qualifications p,
    .rate-details p {
        margin: 8px 0;
        font-size: 14px;
        color: #333;
    }

    .skills {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .skills span {
        display: inline-block;
        background-color: #e0e0e0;
        color: #333;
        border-radius: 12px;
        padding: 4px 8px;
        font-size: 12px;
    }

    .rows {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .actions {
        display: flex;
        gap: 10px;
    }
</style>
<div class="applicant-container">
    @if($jobPost)
    <div class="job-details">
        <h2>{{ $jobPost->title }}</h2>
    </div>
    @else
    <p>No job posts available.</p>
    @endif


    <div class="container headers">
        <div class="row">
            <div class="col-3"></div>
            <div class="col">Qualifications</div>
            <div class="col">Amount</div>
            <div class="col">Duration</div>
            <div class="col">Details</div>
        </div>
    </div>

    @forelse($jobProposals as $jobProposal)

    <div class="freelancer-card">


        <div class="container">
            <div class="row rows">
                <div class="col-3">

                    <div class="profiles">
                        @if($jobProposal->user->profile && $jobProposal->user->profile->profile_picture)
                        <img src="{{ asset('storage/' . $jobProposal->user->profile->profile_picture) }}" alt="Profile Picture" class="profile-pics">
                        @else
                        <div class="rounded-circle bg-success text-white p-2 me-2">
                            {{ strtoupper(substr($jobProposal->user->name, 0, 2)) }}
                        </div>
                        @endif
                        <div class="info">
                            <h3>{{ $jobProposal->user->name }}</h3>
                            <p>{{$jobProposal->user->profile->job_title}}</p>
                        </div>
                    </div>
                    <div class="actions">
                        <a href="{{ url('/contract/' . $jobPost->id . '?user_id=' . $jobProposal->user->id) }}" class="btn btn-primary">View</a>

                        <form action="{{ route('proposals.accept', $jobProposal->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Accept</button>
                        </form>
                        <form action="{{ route('proposals.reject', $jobProposal->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </form>
                    </div>

                </div>
                <div class="col-2">
                    <div class="skills">
                        <span>{{$jobProposal->user->profile->skills}}</span>
                    </div>
                </div>
                <div class="col-2">
                    <div class="rate-details">
                        <p class="rate"><strong>NPR: {{$jobProposal->amount}}</strong>/hr</p>
                    </div>
                </div>
                <div class="col">
                    <div class="rate-details">
                        <p class="rate"><strong>{{$jobProposal->project_duration}}</strong></p>
                    </div>
                </div>
                <div class="col">
                    <div class="rate-details">
                        <p>{{ $jobProposal->cover_letter }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @empty
    <p>No proposals found.</p>
    @endforelse

</div>
@include('components.footer')
@endsection