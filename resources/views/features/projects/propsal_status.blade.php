@extends('components.freelancer.freelan_nav')
@section('content')
<div class="container">
    <div class="px-5">
        <br>
        @if (auth()->user()->status === 'suspended')
        <div class="alert alert-danger">
            Your account is suspended. You may not access some features.
        </div>
        @endif
        <h3>Propoal List</h3>

        <h3>no Proposal</h3>
        <div class="card p-3 shadow-sm" style="border-radius: 10px;">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title mb-1">React Developer for E-commerce Site</h5>
                    <span class="badge bg-warning text-dark">Pending</span>
                </div>
                <div>
                    <span class="text-muted"><i class="bi bi-calendar"></i> 2025-01-15</span>
                </div>
            </div>
        </div>


    </div>

</div>
@include('components.footer')
@endsection