@extends('components/clients/client_nav') <!--IMPORT THE COMPONENTS-->
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="padding-left: 5em;">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Projects</a></li>
        <li class="breadcrumb-item active" aria-current="page">Assign Progress</li>
    </ol>
</nav>

@include('components.footer')
@endsection