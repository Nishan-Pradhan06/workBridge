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
        <div class="d-flex flex-grow-1">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Projects</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Projects</li>
        </div>
        <button class="btn btn-primary btn-sm ms-auto me-3" data-bs-toggle="modal" data-bs-target="#createProjectModal">Create Projects</button>
        <div class="modal fade" id="createProjectModal" tabindex="-1" aria-labelledby="createProjectModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createProjectModalLabel">Create Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="GET" action="{{ route('projects.index') }}">
                            <div class="input-group mb-3">
                                <input
                                    type="text"
                                    name="search"
                                    class="form-control"
                                    placeholder="Search for jobs..."
                                    value="{{ request('search') }}">
                                <button type="submit" class="btn btn-outline-secondary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </ol>
</nav>

<!-- <div class="text-center">
    <img src="{{ asset('no-found.png') }}" alt="No Proposals" style="max-width: 100%; height: 500px;">
    <h4>No proposals Projects at the moment.</h4>
</div> -->

<div class="container mt-5">
    <div class="row g-4">
        <!-- Modal -->



        <!-- Project Card 1 -->
        <div class="col-md-6 col-lg-4">
            <div class="project-card">
                <div class="card-header">E-commerce Website Redesign</div>
                <div class="card-body">
                    <p><strong>Client:</strong> Fashion Boutique Inc.</p>
                    <p><strong>Budget:</strong> $5,000</p>
                    <p><strong>Deadline:</strong> 2025-03-15</p>
                    <div class="mt-3 action">
                        <span class="badge bg-success text-white">Open</span>
                        <button class="btn btn-outline-primary btn-sm">Mark as Completed</button>
                    </div>
                </div>
            </div>
        </div>

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

        <!-- Project Card 3 -->
        <div class="col-md-6 col-lg-4">
            <div class="project-card">
                <div class="card-header">CRM System Integration</div>
                <div class="card-body">
                    <p><strong>Client:</strong> Global Services Ltd.</p>
                    <p><strong>Budget:</strong> $8,000</p>
                    <p><strong>Deadline:</strong> 2025-02-28</p>
                    <span class="badge bg-secondary text-white">Completed</span>
                </div>
            </div>
        </div>

        <!-- Project Card 4 -->
        <div class="col-md-6 col-lg-4">
            <div class="project-card">
                <div class="card-header">Social Media Marketing Campaign</div>
                <div class="card-body">
                    <p><strong>Client:</strong> Eco Friendly Products</p>
                    <p><strong>Budget:</strong> $3,000</p>
                    <p><strong>Deadline:</strong> 2025-04-10</p>
                    <div class="mt-3 action">
                        <span class="badge bg-success badge-status">Open</span>
                        <button class="btn btn-outline-primary btn-sm">Mark as Completed</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Card 5 -->
        <div class="col-md-6 col-lg-4">
            <div class="project-card">
                <div class="card-header">Data Analytics Dashboard</div>
                <div class="card-body">
                    <p><strong>Client:</strong> Financial Insights Corp.</p>
                    <p><strong>Budget:</strong> $12,000</p>
                    <p><strong>Deadline:</strong> 2025-06-20</p>
                    <div class="mt-3 action">
                        <span class="badge bg-info badge-status">In Progress</span>
                        <button class="btn btn-outline-primary btn-sm">Mark as Completed</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="project-card">
                <div class="card-header text-center">
                    <span class="plus-icon">+</span>
                    <div>Create</div>
                </div>
                <div class="card-body text-center">
                    <button class="btn btn-outline-primary btn-sm">Create New Project</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelector('.card.card-custom').addEventListener('click', () => {
        const modal = new bootstrap.Modal(document.getElementById('createProjectModal'));
        modal.show();
    });
</script>
@include('components.footer')
@endsection