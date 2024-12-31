@extends('layouts.admin-app')

@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


@endsection

@section('contents')

    <div class="container-fluid mt-5">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Collections and Deposits
            </h1>
        </div>

        <!-- Wrapper to center the card -->
        <div class="d-flex justify-content-center">
            <div class="card w-100 h-100">
                <div class="card-body">

                    <div class="row">
                        <!-- Left Side: Livewire Component -->
                        <div class="col-md-6">
                            @livewire('admin.create-collection-reports-component')
                        </div>

                        <!-- Right Side: Datepicker -->
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            @livewire('admin.print-collection-reports')
                        </div>

                    </div>

                   @livewire('admin.reports-table')

                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')

    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

@endsection
