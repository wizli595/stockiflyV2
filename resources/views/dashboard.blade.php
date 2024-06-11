@extends('layouts.app')

@section('head')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
@endsection

@if (auth()->user()->can('brand-create'))

    @section('content')

        <div class="container">
            <div class="card">
                <div class="card-header">Manage Users </div>
                <div class="card-body">
                    {{ $dataTable->table() }}  
                </div>
            </div> 
        </div>

        
            
@endsection

@endif

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
