@extends('components.freelancer.freelan_nav') <!--IMPORTING THE FILES FROM COMPOENTS/NAVBAR.BLADE.PHP-->
@section('title','Submit a Proposal') <!--SETTINGUP THE TITLE-->
@section('content') <!--START THE CONTENT FROM HERE-->
<style>
    /* 
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f0f2f5;
    } */

    .form-container {
        width: 100%;
        margin: 10px 30% ;
        max-width: 600px;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        align-self: center;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin: 10px 0 5px;
        font-weight: bold;
    }

    input[type="number"],
    input[type="date"],
    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 15px;
        font-size: 16px;
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
<div class="form-container">

    <h2>submit proposal</h2>

    <form action="/submit-proposal" method="post">
        @csrf
        <label for="due_date">Due Date:</label>
        <input type="date" id="due_date" name="due_date" >

        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" placeholder="Enter amount" >

        <label for="project_duration">Project Duration:</label>
        <input type="date" id="project_duration" name="project_duration" >

        <label for="cover_letter">Cover Letter:</label>
        <textarea id="cover_letter" name="cover_letter" rows="4" placeholder="Write your cover letter" ></textarea>

        <button type="submit" class="btn btn-primary">Submit Proposal</button>
    </form>
</div>
@include('components.footer')

@endsection <!--END THE CONTENT FROM HERE-->