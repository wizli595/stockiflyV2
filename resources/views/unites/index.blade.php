<x-app-layout>
    @section('content')

        <!-- Head content -->
        <div class="mb-3 card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5 class="mb-2"> Unites </h5>
                    </div>
                </div>
            </div>
            <div class="card-body border-top">
                <div class="d-flex">
                    <div class="flex-1">
                        <p>
                            <a href="{{ route('dashboard') }}">menu.dashboard</a>
                             - unites
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Head content -->


        <div class="card">
            <div class="card-header">

                <div class="row">
                    <div class="col">
                        <h5 class="mb-2">
                            Manage unites
                        </h5>
                    </div>

                    <div class="col-auto d-none d-sm-block">
                        <h6 class="text-uppercase text-600">
                            <!-- Add unites Buuton -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editModal">Add
                            </button>
                        </h6>
                    </div>

                </div>

            </div>

            <div class="card-body">
                {{ $dataTable->table() }}
            </div>

        </div>


        <!-- Add Brand  modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Add Unites </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('unites.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="col-form-label" for="unite_name">Unite Name </label>
                                <input class="form-control" name="unite_name" id="unite_name" type="text" />
                            </div>
                            
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit">Add</button>
                            </form>

                    </div>
                </div>

            </div>
        </div>

        <!-- Edit  modal
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Update Unite </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="POST">
                                @csrf
                                @method('PUT')
                                
                            <div class="mb-3">
                                <label class="col-form-label" for="unite_name">Unite Name </label>
                                <input class="form-control" name="unite_name" id="unite_name" type="text" />
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>

                </div>
            </div>
             -->

        <!-- Show  modal
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showModal">Show</button>
            <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="showModalLabel">Update Unite </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="mb-2">

                                            </h5>
                                        </div>
                                        <div class="col-auto d-none d-sm-block">
                                            <h6 class="text-uppercase text-600">Unite<span class="fas fa-user ms-2"></span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body border-top">
                                    <div class="d-flex"><span class="fas fa-user text-success me-2"
                                            data-fa-transform="down-5"></span>
                                        <div class="flex-1">
                                            <p class="mb-0">Unite was created</p>
                                            <p class="mb-0 fs--1 text-600">
                                                {{-- {{ $unites->created_at }} --}} 2024-12-25...
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
             -->
  
  
    
             @endsection

    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush

</x-app-layout>
