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
    <h2>Edit a Job Post</h2>
    <form action="{{ url('/update/' . $jobPost->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Enter Job Title" required name="title" value="{{$jobPost->title}}">
        </div>
        <div class="form-group">
            <label for="des">Description</label>
            <textarea class="form-control" id="editor" rows="3" placeholder="Enter job description" name="des">{{$jobPost->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="duration">Duration</label>
            <input type="date" class="form-control" id="duration" placeholder="duration" name="duration" value="{{$jobPost->deadline}}">
        </div>
        <div class="form-group">
            <label for="budget">Budget</label>
            <input type="text" class="form-control" id="budget" placeholder="12k" name="budget" value="{{$jobPost->budget}}">
        </div>
        <div class="form-group">
            <label for="skill">Skills</label>
            <input type="text" class="form-control" id="skill" placeholder="Enter skill" name="skill" value="{{$jobPost->skills}}">
        </div>
        @if (auth()->user()->status === 'suspended')
        <div class="alert alert-danger">
            Your account is suspended. You cannot access these features.
        </div>
        @else
        <button type="submit" class="btn btn-primary">Update</button>
        @endif

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