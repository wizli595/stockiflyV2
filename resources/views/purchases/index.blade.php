<x-app-layout>

    @section('content')
        <!-- Head content -->
        <div class="mb-3 card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5 class="mb-2">menu.purchases</h5>
                    </div>
                </div>
            </div>
            <div class="card-body border-top">
                <div class="d-flex">
                    <div class="flex-1">
                        <p>
                            <a href="{{ route('dashboard') }}">menu.dashboard</a>
                            - menu.parties - menu.purchases
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
                            Manage purchases
                        </h5>
                    </div>

                    <div class="col-auto d-none d-sm-block">
                        <h6 class="text-uppercase text-600">
                            <!-- Add Purchases Buuton -->
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



        <!-- Add Purchases  modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Add Purchases </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('purchases.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="purchase_date">Purchase Date:</label>
                                <input type="date" class="form-control" id="purchase_date" name="purchase_date">
                            </div>
                            <div class="form-group">
                                <label for="purchase_nbr">Purchase Number:</label>
                                <input type="text" class="form-control" id="purchase_nbr" name="purchase_nbr">
                            </div>
                            <div class="form-group">
                                <label for="purchase_status">Purchase Status:</label>
                                <select class="form-control" id="purchase_status" name="purchase_status">
                                    <option value="pending">En attente</option>
                                    <option value="completed">Complété</option>
                                    <option value="cancelled">Annulé</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="purchase_type">Purchase Type:</label>
                                <input type="text" class="form-control" id="purchase_type" name="purchase_type">
                            </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Add</button>
                    </form>
                </div>

            </div>
        </div>

        <!-- Edit  modal
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Update Purchases </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{-- <form action=" {{ route('purchases.update') }} " method="POST"> --}}
                                @csrf
                                @method('PUT')

                                  <div class="form-group">
                    <label for="purchase_date">Purchase Date:</label>
                    <input type="date" class="form-control" id="purchase_date" name="purchase_date">
                </div>
                <div class="form-group">
                    <label for="purchase_nbr">Purchase Number:</label>
                    <input type="text" class="form-control" id="purchase_nbr" name="purchase_nbr">
                </div>
                <div class="form-group">
                    <label for="purchase_status">Purchase Status:</label>
                    <select class="form-control" id="purchase_status" name="purchase_status">
                        <option value="pending">En attente</option>
                        <option value="completed">Complété</option>
                        <option value="cancelled">Annulé</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="purchase_type">Purchase Type:</label>
                    <input type="text" class="form-control" id="purchase_type" name="purchase_type">
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
                            <h5 class="modal-title" id="showModalLabel">Update Purchases </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="mb-2">
                                                {{-- Purchases {{ $purchases->purchase_nbr  }} --}}
                                            </h5>
                                            <a class="dropdown-item text-danger" href="#">Delete user</a>
                                        </div>
                                        <div class="col-auto d-none d-sm-block">
                                            <h6 class="text-uppercase text-600">Purchases<span class="fas fa-user ms-2"></span>
                                            </h6>
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
