@extends('components.freelancer.freelan_nav') <!--IMPORTING THE FILES FROM COMPOENTS/NAVBAR.BLADE.PHP-->
@section('title','Submit a Proposal') <!--SETTINGUP THE TITLE-->
@section('content') <!--START THE CONTENT FROM HERE-->
<h2>submit proposal</h2>
<form action="" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title"
            placeholder="Enter the title of your proposal">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description"
            placeholder="Enter the description of your proposal"></textarea>
    </div>
    <button class="btn btn-primary sucess">Submit</button>

    @endsection <!--END THE CONTENT FROM HERE-->