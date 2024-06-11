<x-app-layout>

    @section('head')
    <style>
        .notification {
            background-color: red;
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        .notification button {
            margin-left: 10px;
            background-color: white;
            color: red;
            border: none;
            padding: 5px;
            cursor: pointer;
        }
    </style>
        
    @endsection

    @section('content')

    {{-- @if($notifications->count() > 0)
     <div class="notification">
        @foreach($notifications as $notification)
            <p>
                {{ $notification->data['message'] }}
                <form action="{{ route('products.markAsRead', $notification->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Mark as Read</button>
                </form>
            </p>
        @endforeach
      </div>
    @endif --}}

        <div class="mb-3 card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5 class="mb-2">menu.product</h5>
                    </div>
                </div>
            </div> 
            <div class="card-body border-top">
                <div class="d-flex">
                    <div class="flex-1">
                        <p>
                            <a href="{{ route('dashboard') }}">menu.dashboard</a>
                            - product_manager - menu.product
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
                            Manage products
                        </h5>
                    </div>

                    <div class="col-auto d-none d-sm-block">
                        <h6 class="text-uppercase text-600">
                            <!-- Add Customer Buuton -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editModal">Add
                            </button>
                            </span>
                        </h6>

                        <!-- Notification dropdown in Blade -->
                        <ul class="dropdown-menu">
                            @foreach(Auth::user()->unreadNotifications as $notification)
                            <li>
                                {{ $notification->data['product_name'] }} stock is low: {{ $notification->data['stock'] }} units left.
                     </li>
    @endforeach
</ul>

                    </div>
                </div>
 
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>



        <!-- Add Product  modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Add product </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="col-form-label" for="name">Name </label>
                                <input class="form-control" name="product_name" id="name" type="text" />
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label"for="product_code"><Param></Param>Product code
                                </label>
                                <input class="form-control" name="product_code" id="product_code" type="number" />
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label" for="buying_price"> Buying price </label>
                                <input class="form-control" name="buying_price" id="buying_price" type="number" />
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label" for="selling_price"> Selling price </label>
                                <input class="form-control" name="selling_price" id="selling_price" type="number" />
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label" for="stock"> Stock </label>
                                <input class="form-control" name="stock" id="stock" type="number" />
                            </div> 

                            <div class="mb-3">
                                <label class="col-form-label" for="product_image"> Product image </label>
                                <input class="form-control" name="product_image" id="product_image" type="file" />
                            </div>
                            
                            <select name="categorie_id">
                                    @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->categorie_name }}</option>
                                    @endforeach 
                            </select>                 
                            
                            <select name="werhouse_id">
                                    @foreach ($werhouses as $werhouse)
                                    <option value="{{ $werhouse->id }}">{{ $werhouse->werhouse_name }}</option>
                                    @endforeach 
                            </select>         

                            <select name="brand_id">
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach 
                            </select>  

                            <select name="unite_id">
                                    @foreach ($unites as $unite)
                                    <option value="{{ $unite->id }}">{{ $unite->unit_name }}</option>
                                    @endforeach 
                            </select>                 


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
                        <h5 class="modal-title" id="editModalLabel">Update Product </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- <form action="{{route('products.update')}}" method="POST"> --}}
                            {{-- @csrf --}}
                            {{-- @method('PUT') --}}

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
                        <h5 class="modal-title" id="showModalLabel">Update Customer </h5>
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
                                        <h6 class="text-uppercase text-600">Customer<span class="fas fa-user ms-2"></span>
                                        </h6>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body border-top">
                                <div class="d-flex"><span class="fas fa-user text-success me-2"
                                        data-fa-transform="down-5"></span>
                                    <div class="flex-1">
                                        <p class="mb-0">Customer was created</p>
                                        <p class="mb-0 fs--1 text-600">
                                            {{-- {{ $products->created_at }} --}} 2024-12-25...
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
