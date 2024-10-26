@extends('components.clients.client_nav') <!--IMPORTING THE FILES FROM COMPOENTS/NAVBAR.BLADE.PHP-->
@section('title','Dashboard') <!--SETTINGUP THE TITLE-->
@section('content') <!--START THE CONTENT FROM HERE-->


<form action="/save-job" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter Job Title" required name="title">
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

    <button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection <!--END THE CONTENT FROM HERE-->