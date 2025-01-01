@extends('components.freelancer.freelan_nav')
@section('content')
<div class="container">
    <div class="px-5">
        <br>
        @if (auth()->user()->status === 'suspended')
        <div class="alert alert-danger">
            Your account is suspended. You may not access some features.
        </div>
        @endif
        <h3>Propoal List</h3>

        <h3>no Proposal</h3>
        @foreach($ProposalStatus['proposals'] as $proposal)
        <div class="card p-3 shadow-sm" style="border-radius: 10px; margin-top: 20px;">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <!-- Job Title: Assuming the first jobPost relates to the proposal -->
                    <h5 class="card-title mb-1">
                        {{ $ProposalStatus['jobDetails']->firstWhere('id', $proposal->job_id)->title }}
                    </h5> <!-- Job Title -->

                    <!-- Proposal's Cover Letter -->
                    <p>{{ $proposal->cover_letter }}</p>

                    <!-- Proposal Status Badge -->
                    @if($proposal->status === 'pending')
                    <span class="badge bg-warning text-dark">Pending</span>
                    @elseif($proposal->status === 'rejected')
                    <span class="badge bg-danger text-white">Rejected</span>
                    @elseif($proposal->status === 'accepted')
                    <span class="badge bg-success text-white">Accepted</span>
                    @else
                    <span class="badge bg-secondary text-white">Unknown</span>
                    @endif

                </div>
                <div>
                    <span class="text-muted">
                        <i class="bi bi-calendar"></i> {{ $proposal->created_at->format('F d, Y') }}
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@include('components.footer')
@endsection