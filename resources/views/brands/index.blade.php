<x-app-layout>

    @section('content')
        <!-- Head content -->
        <div class="mb-3 card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5 class="mb-2"> Brands </h5>
                    </div>
                </div>
            </div>
            <div class="card-body border-top">
                <div class="d-flex">
                    <div class="flex-1">
                        <p>
                            <a href="{{ route('dashboard') }}">menu.dashboard</a>
                            - products_manager - brands
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
                            Manage Brands
                        </h5>
                    </div>

                    <div class="col-auto d-none d-sm-block">
                        <h6 class="text-uppercase text-600">
                            <!-- Add Brands Buuton -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addtModal"> Add 
                            </button>
       
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showModal">
                                Show Brands
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
        <div class="modal fade" id="addtModal" tabindex="-1" aria-labelledby="addtModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addtModalLabel">Add Brand </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('brands.store') }}" method="POST">
                            @csrf

                            <div class="form-group ">
                                <label for="brand_name">Name Brand:</label>
                                <input type="text" class="form-control" id="brand_name" name="brand_name">
                            </div>

                            <button class="btn btn-secondary pt-16" type="button" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary pt-16 " type="submit">Add</button>
                        
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
                        <h5 class="modal-title" id="editModalLabel">Update Customer </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST">
                            @csrf
                            @method('PUT')

                           <div class="form-group">
                               <label for="brand_name">Name Brand:</label>
                               <input type="text" class="form-control" id="brand_name" name="brand_name">
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

        {{-- Show  modal --}}
        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showModalLabel"> Brands </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                                <div class="row">
                                    <div class="col">
                                        <h4 >
                                            {{-- {{ $brands->brand_name }}  --}}
                                        </h4>
                                    </div>
    
                                </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>



    @endsection

    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush

</x-app-layout>
