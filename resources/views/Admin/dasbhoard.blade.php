@extends('layouts.admin-app')



@section('contents')
    <div class="container-fluid mt-lg-5">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <div class="card-body">

            @livewire('admin.dashboard.data-analytics')

            @livewire('admin.dashboard.annual-payment-projection')
        </div>
    </div>
@endsection






