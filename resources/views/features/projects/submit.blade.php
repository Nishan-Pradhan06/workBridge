@extends('components/clients/client_nav') <!--IMPORT THE COMPONENTS-->
@section('content')
<div class="container">
    <h2>Create Project</h2>
    <form action="{{ route('projects.submit') }}" method="POST">
   
        <div class="form-group">
            <label for="project_id">Select Project</label>
            <select id="project_id" name="project_id" class="form-control" required>
                <option value="" selected>Select a Project</option>
               
                <option value="d">fsdfs</option>
               
            </select>
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input type="url" id="url" name="url" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@include('components.footer')
@endsection