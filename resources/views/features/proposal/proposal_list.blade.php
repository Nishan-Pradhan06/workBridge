@extends('components/clients/client_nav') <!--IMPORT THE COMPONENTS-->
@section('content')
<style>
    .applicant-container {
        padding: 0 140px;
    }

    .job-details {
        padding-left: 40px;
    }

    .headers {
        display: flex;
        justify-content: center;
        font-weight: bold;
        color: #333;
    }

    .headers p {
        flex: 0.17;
        text-align: center;
        font-size: 14px;
    }

    .applicants-details {
        padding: 8px 50px;
    }

    .freelancer-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 74vw;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;
        padding: 20px;
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

    .profile-pic {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        margin-bottom: 10px;
        border: 2px solid #0f0;
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

    .btn {
        width: 100px;
    }

    .freelancer-details {
        display: flex;
        justify-content: space-around;
        /* justify-content: space-between; */
        padding-left: 30px;
        word-wrap: wordwrap;
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

    .rate {
        font-size: 20px;
        font-weight: bold;
        color: #333;
    }

    .rate-details p {
        font-size: 14px;
        color: #666;
    }
</style>

<div class="applicant-container">
    <div class="job-details">
        <h2>
            Flutter Developer
        </h2>
    </div>
    <div class="headers">
        <p></p>
        <p>Qualifications</p>
        <p>Amount</p>
        <p>Duration</p>
        <p>Details</p>
    </div>
    @forelse ($jobProposals as $jobProposal)
    <div class="applicants-details">
        <div class="freelancer-card">
            <div class="freelancer-info">
                <div class="profiles">
                    <img src="" alt="Profile Picture" class="profile-pic" width="100" height="100">
                    <div class="info">
                        <h3>Nishan Pradhan</h3>
                        <p>Application Development | Flutter</p>
                    </div>
                </div>
                <div class="actions">
                    <button class="btn btn-success">Hire</button>
                </div>
            </div>
            <div class="freelancer-details">
                <div class="qualifications">
                    <div class="skills">
                        <span>Web Development</span>
                        <span>Typing</span>
                        <span>Data Entry</span>
                        <span>Canva</span>
                    </div>
                </div>
            </div>
            <div class="rate-details">
                <p class="rate"><strong>$20.00</strong>/hr</p>
            </div>
            <div class="rate-details">
                <p class="rate"><strong>$20.00</strong>/hr</p>
                <p class="rate"><strong>$20.00</strong>/hr</p>
            </div>
            <div class="rate-details">
                <p class="rate"><strong>$20.00</strong>/hr</p>
                <p>{{ $jobProposal->cover_letter }}</p>
            </div>
        </div>
    </div>
    @empty
    <p>No proposals found.</p>
    @endforelse
</div>


@endsection