@extends('components/clients/client_nav') <!--IMPORT THE COMPONENTS-->
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
        <li class="breadcrumb-item active" aria-current="page">All Projects</li>
    </ol>
</nav>

<div class="container mt-5">
    <div class="row g-4">
        <!-- Project Card 1 -->
        @foreach($projects as $project)
        <div class="col-md-6 col-lg-4">
            <div class="project-card">
                <div class="card-header">{{$project->title}}</div>
                <div class="card-body">
                    <!-- <p><strong>Client:</strong> Fashion Boutique Inc.</p> -->
                    <p><strong>Deadline:</strong>{{$project->date}}</p>
                    <div class="mt-3 action">
                        @if ($project->status == 'completed')
                        <span class="badge bg-success text-white">Completed</span>
                        @elseif ($project->status == 'pending')
                        <span class="badge bg-warning text-white">Pending</span>
                        @elseif ($project->status == 'in_progress')
                        <span class="badge bg-info text-white ">Progress</span>
                        @endif
                        <button class="btn btn-outline-primary btn-sm">Mark as Completed</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Project Card 2 -->
        <div class="col-md-6 col-lg-4">
            <div class="project-card">
                <div class="card-header">Mobile App Development</div>
                <div class="card-body">
                    <p><strong>Client:</strong> TechStart Solutions</p>
                    <p><strong>Budget:</strong> $15,000</p>
                    <p><strong>Deadline:</strong> 2025-05-30</p>
                    <div class="mt-3 action">
                        <span class="badge bg-warning text-dark">In Progress</span>
                        <button class="btn btn-outline-primary btn-sm">Mark as Completed</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.footer')
@endsection