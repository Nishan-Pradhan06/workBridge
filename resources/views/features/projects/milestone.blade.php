@extends('components/clients/client_nav') <!--IMPORT THE COMPONENTS-->
@section('content')
<style>
    .container {
        display: flex;
        align-items: flex-start;
        gap: 20px;
    }

    .card {
        height: 600px;
        max-width: 400px;
    }

    .card-header {
        font-weight: bold;
        text-align: center;
    }

    .card-body {
        overflow-y: auto;
        max-height: calc(100% - 50px);
        /* Adjusting for header/footer */
        padding: 10px;
    }

    .milestone-card {
        max-width: 340px;
        max-height: 240px;
        border: 1px solid grey;
        padding: 10px;
        border-radius: 10px;
        background-color: #f7f7f7;
        margin-bottom: 0.5em;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .dropdown-toggle::after {
        display: none !important;
        /* Hide the default arrow */
    }
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="padding-left: 5em;">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Projects</a></li>
        <li class="breadcrumb-item active" aria-current="page">Assign Progress</li>
    </ol>
</nav>

<div class="container">
    <!-- Todo Card -->
    <div class="card todo">
        <div class="card-header">
            Todo
        </div>
        <div class="card-body">

            <div class="milestone-card">
                <div class="milestone-details">
                    <h5 class="card-title">Enhance Job Posting System</h5>
                    <p class="card-text">
                        Improve the job posting functionality to allow clients to upload detailed project requirements, including attachments, deadlines, and budget estimates.
                    </p>
                </div>
                <div class="actions">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
                        <i class="fas fa-ellipsis-v icons" style="font-size: 20px;"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">Todo</a>
                        <a class="dropdown-item" href="">In Progress</a>
                        <a class="dropdown-item" href="">Done</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <a href="#" class="btn btn-link" data-toggle="modal" data-target="#add-milestone"> Add Milestone</a>
        </div>
    </div>

    <!-- In Progress Card -->
    <div class="card in-progress">
        <div class="card-header">
            In Progress
        </div>
        <div class="card-body">
            <div class="milestone-card">
                <div class="milestone-details">
                    <h5 class="card-title">Enhance Job Posting System</h5>
                    <p class="card-text">
                        Improve the job posting functionality to allow clients to upload detailed project requirements, including attachments, deadlines, and budget estimates.
                    </p>
                </div>
                <div class="actions">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
                        <i class="fas fa-ellipsis-v icons" style="font-size: 20px;"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">Todo</a>
                        <a class="dropdown-item" href="">In Progress</a>
                        <a class="dropdown-item" href="">Done</a>
                    </div>

                </div>
            </div>
</div>
        </div>

        <!-- Done Card -->
        <div class="card done">
            <div class="card-header">
                Done
            </div>
            <div class="card-body">
                <div class="milestone-card">
                    <div class="milestone-details">
                        <h5 class="card-title">Enhance Job Posting System</h5>
                        <p class="card-text">
                            Improve the job posting functionality to allow clients to upload detailed project requirements, including attachments, deadlines, and budget estimates.
                        </p>
                    </div>
                    <div class="actions">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
                            <i class="fas fa-ellipsis-v icons" style="font-size: 20px;"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="">Todo</a>
                            <a class="dropdown-item" href="">In Progress</a>
                            <a class="dropdown-item" href="">Done</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="add-milestone" tabindex="-1" role="dialog" aria-labelledby="add-milestone" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add-milestone">Add Milestone</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="milestone-title">Title</label>
                                <input type="text" class="form-control" id="milestone-title">
                            </div>
                            <div class="form-group">
                                <label for="milestone-des">Description</label>
                                <textarea class="form-control" id="milestone-des" rows="3"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
    @endsection