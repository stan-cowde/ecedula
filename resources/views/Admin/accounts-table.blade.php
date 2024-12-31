@extends('layouts.admin-app')

@section('css')

@endsection

@section('contents')


    <div class="container-fluid mt-5">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Accounts Table</h1>
        </div>

        <!-- Wrapper to center the card -->
        <div class="d-flex justify-content-center">
            <div class="card w-100 h-100">
                <div class="card-body">

                    @livewire('admin.create-account-modals')

                    @livewire('admin.accounts-table')

                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.js"></script>
@endsection
