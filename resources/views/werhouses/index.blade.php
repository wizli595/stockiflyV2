<x-app-layout>

    @section('content') 
        <!-- Head content --> 
        <div class="mb-3 card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5 class="mb-2">menu.werhouses</h5>
                    </div>
                </div>
            </div>
            <div class="card-body border-top">
                <div class="d-flex">
                    <div class="flex-1">
                        <p>
                            <a href="{{ route('dashboard') }}">menu.dashboard</a>
                            - menu.parties - menu.werhouses
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
                            Manage werhouses
                        </h5>
                    </div>

                    <div class="col-auto d-none d-sm-block">
                        <h6 class="text-uppercase text-600">
                            <!-- Add Werhouses Buuton -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editModal">Add
                            </button>
                            </span>
                        </h6>
                    </div>
                </div>

            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>



        <!-- Add Werhouses  modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Add Werhouses </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('werhouses.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="werhouse_name">Werhouse Name:</label>
                                <input type="text" class="form-control" id="werhouse_name" name="werhouse_name">
                            </div>
                            <div class="form-group">
                                <label for="werhouse_adresse">Werhouse adresse:</label>
                                <input type="text" class="form-control" id="werhouse_adresse" name="werhouse_adresse">
                            </div>
                            <div class="form-group">
                                <label for="werhouse_capacity">Werhouse capacity:</label>
                                <input type="number" class="form-control" id="werhouse_capacity" name="werhouse_capacity">
                            </div>
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
                        <h5 class="modal-title" id="editModalLabel">Update Werhouses </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST">
                            @csrf
                            @method('PUT')

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
                                <label for="adresse">Adresse</label><br>
                                <textarea id="adresse" name='adresse' rows="3" cols="30"></textarea>
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
                        <h5 class="modal-title" id="showModalLabel">Update Werhouses </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="mb-2">
                                            User Name (<a href="mailto:ExemplesMail@gmail.com">ExemplesMail@gmail.com</a>)
                                        </h5>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item text-danger" href="#">Delete user</a>
                                    </div>
                                    <div class="col-auto d-none d-sm-block">
                                        <h6 class="text-uppercase text-600">Werhouses<span class="fas fa-user ms-2"></span>
                                        </h6>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body border-top">
                                <div class="d-flex"><span class="fas fa-user text-success me-2"
                                        data-fa-transform="down-5"></span>
                                    <div class="flex-1">
                                        <p class="mb-0">Werhouses was created</p>
                                        <p class="mb-0 fs--1 text-600">
                                            {{-- {{ $werhouses->created_at }} --}} 2024-12-25...
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
