@extends('components.clients.client_nav') <!--IMPORTING THE FILES FROM COMPOENTS/NAVBAR.BLADE.PHP-->
@section('title','Dashboard') <!--SETTINGUP THE TITLE-->
@section('content') <!--START THE CONTENT FROM HERE-->

<a href="/job-post" class="btn btn-primary">Post a Job</a>
@include('components.footer')
@endsection <!--END THE CONTENT FROM HERE-->