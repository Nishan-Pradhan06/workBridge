@extends('components.clients.client_nav') <!--IMPORTING THE FILES FROM COMPOENTS/NAVBAR.BLADE.PHP-->
@section('title','Dashboard') <!--SETTINGUP THE TITLE-->
@section('content') <!--START THE CONTENT FROM HERE-->

<style>

.container {
    padding: 20px;
    height:50vh;

    
}
h1{
    margin:0 200px;
}

.section {
    text
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
p,button{
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
<h1>Welcome to Your Dashboard</h1>


       

    <div class="container">
    
        <div id="intro" class="section">
            <h2>Getting Started,</h2><br>
            <p>Welcome to our freelancing platform!<br> 
            Here you can post any projects job and also you can find job.<br>
             Let's get you started posting Jobs!</p>
            <button onclick="postProject()">Post Project</button>
        </div>
    </div>



@include('components.footer')
@endsection <!--END THE CONTENT FROM HERE-->