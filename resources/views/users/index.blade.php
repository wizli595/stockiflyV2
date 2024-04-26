@extends('layouts.app')

@if (auth()->user()->can('brand-create'))

    @section('head')
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    @endsection

    @section('content')
        {{-- <div>  <livewire:user-chart/>nn</div> --}}

        <div class="container">
            <div class="card">
                <div class="card-header">Manage Users</div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
        <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                <div class="modal-content position-relative">
                    <div class="top-0 mt-2 position-absolute end-0 me-2 z-index-1">
                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="p-0 modal-body">
                        <div class="py-3 rounded-top-lg ps-4 pe-6 bg-light">
                            <h4 class="mb-1" id="modalExampleDemoLabel">Add User </h4>
                        </div>

                        <div class="p-4 pb-0">
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="col-form-label" for="name">Name </label>
                                    <input class="form-control" name="name" id="name" type="text" />
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label"for="username">User Name
                                    </label>
                                    <input class="form-control" name="username" id="username" type="text" />
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label" for="phone"> Phone </label>
                                    <input class="form-control" name="phone" id="phone" type="tel" />
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label" for="email">Email </label>
                                    <input class="form-control" name="email" id="email" type="email" />
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label" for="password">Password </label>
                                    <input class="form-control" name="password" id="password" type="password" />
                                </div>

                                <div class="mb-3">
                                    <label for="adresse">Adresse</label><br>
                                    <textarea id="adresse" name='adresse' rows="3" cols="30"></textarea>
                                </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
