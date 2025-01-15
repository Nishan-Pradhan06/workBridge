@extends('components.freelancer.freelan_nav') <!--IMPORT THE COMPONENTS-->
@section('content')
<style>
    .project-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        margin: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #ddd;
        padding: 10px 15px;
        font-size: 1.1rem;
        font-weight: 600;
    }

    .action {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .card-custom {
        height: 235px;
        width: 330px;
        margin: auto;
        cursor: pointer;
    }

    .card-custom .card-body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .icon {
        font-size: 3rem;
        color: #6c757d;
        /* Bootstrap secondary color */
    }
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb d-flex align-items-center" style="padding-left: 5em;">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Projects</a></li>
        <li class="breadcrumb-item active" aria-current="page">View Your Projects</li>
    </ol>
</nav>

<div class="container mt-5">
    <div class="row g-4">
        @forelse($projects as $project)
        <div class="col-md-6 col-lg-4">
            <div class="project-card">
                <div class="card-header">{{$project->title}}</div>
                <div class="card-body">
                    <p><strong>Deadline:</strong>{{$project->date}}</p>
                    <div class="mt-3 action">
                        @if ($project->status == 'completed')
                        <span class="badge bg-success text-white">Completed</span>
                        @elseif ($project->status == 'pending')
                        <span class="badge bg-warning text-white">Pending</span>
                        @elseif ($project->status == 'in_progress')
                        <span class="badge bg-info text-white">In Progress</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center">
            <img src="{{ asset('no-found.png') }}" alt="No Proposals" style="max-width: 100%; height: 500px;">
            <h4>No proposals available at the moment.</h4>
        </div>
        @endforelse

    </div>
</div>
@include('components.footer')
@endsection