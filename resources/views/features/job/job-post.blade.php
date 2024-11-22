@extends('components.clients.client_nav') <!--IMPORTING THE FILES FROM COMPOENTS/NAVBAR.BLADE.PHP-->
@section('title','Dashboard') <!--SETTINGUP THE TITLE-->
@section('content') <!--START THE CONTENT FROM HERE-->
<style>
    .container {
        padding: 10px 50px
    }

    label {
        font-size: 20px;
    }

    form input {
        height: 60px !important;
    }
</style>

<div class="container">
    <h2>Post a Job</h2>
    <form action="/save-job" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control " id="title" placeholder="Enter Job Title" required name="title">
        </div>
        <div class="form-group">
            <label for="des">Description</label>
            <textarea class="form-control" id="editor" rows="3" placeholder="Enter job description" name="des"></textarea>
        </div>

        <div class="form-group">
            <label for="duration">Duration</label>
            <input type="date" class="form-control" id="duration" placeholder="duration" name="duration">
        </div>
        <div class="form-group">
            <label for="budget">Budget</label>
            <input type="text" class="form-control" id="budget" placeholder="12k" name="budget">
        </div>
        <div class="form-group">
            <label for="skill">Skills</label>
            <input type="text" class="form-control" id="skill" placeholder="Enter skill" name="skill">
        </div>
        <!-- Hidden Input for client_id -->
        <input type="hidden" name="client_id" value="{{ auth()->id() }}">
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
<!-- using editor cdn for description -->
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor', {
        toolbar: [{
                name: 'basicstyles',
                items: ['Bold', 'Italic']
            },
            {
                name: 'paragraph',
                items: ['NumberedList', 'BulletedList']
            },
        ],
        height: 300
    });
</script>
@endsection <!--END THE CONTENT FROM HERE-->