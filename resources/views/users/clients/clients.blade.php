@extends('components.clients.client_nav') <!--IMPORTING THE FILES FROM COMPOENTS/NAVBAR.BLADE.PHP-->
@section('title','Dashboard') <!--SETTINGUP THE TITLE-->
@section('content') <!--START THE CONTENT FROM HERE-->

<style>

.container {
    padding: 20px;
    height:50vh;   
}
.welcome-section{
    display: flex;
    justify-content:space-between;
    align-items:center;
}

.section {
    background: white;
    margin: 10px 0;
    height:35vh;
    padding: 15px;
    border-radius: 5px;
    box-shadow:  2px 5px rgba(0, 0, 0, 0.1);
    text-align:cenetr;
}
h2{
    text-align:center;
}
.section>p,button{
    text-align:center;
    font-size:20px;
}

button {
    background-color: #007bff;
    color: white;
    border: none;
    text-align:center;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

</style>
<div class="container">
    <div class="welcome-section">
    <h3>Welcome, {{auth()->user()->name}}</h3>
    <a href="/job-post" class="btn btn-primary">Post a Job</a>
    </div>
        
        <div id="intro" class="section">
            <p> 
            Here you can post any projects job and also you can find job.
             Let's get you started posting Jobs!</p>
            
        </div>
    </div>
@include('components.footer')
@endsection <!--END THE CONTENT FROM HERE-->