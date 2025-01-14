@extends('components/clients/client_nav') <!--IMPORT THE COMPONENTS-->
@section('content')
<div class="container">
    <h2>Create Project</h2>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="job_post_id">Select Job Post</label>
            <select id="job_post_id" name="job_post_id" class="form-control" required>
                <option value="" selected>Select the Job Post</option>
                @foreach($jobPosts as $jobPost)
                <option value="{{ $jobPost->id }}"
                    data-title="{{ $jobPost->title }}"
                    data-date="{{ $jobPost->date }}"
                    data-status="{{ $jobPost->status }}">
                    {{ $jobPost->title }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Project Title</label>
            <input type="text" id="project_title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="end_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Project</button>
    </form>
</div>

<script>
    // JavaScript to update project title, date, and status based on selected job post
    document.getElementById('job_post_id').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var title = selectedOption.getAttribute('data-title');
        var date = selectedOption.getAttribute('data-date');
        var status = selectedOption.getAttribute('data-status');

        // Display or use this data as needed
        console.log('Title:', title);
        console.log('Date:', date);
        console.log('Status:', status);
    });
</script>

@include('components.footer')
@endsection