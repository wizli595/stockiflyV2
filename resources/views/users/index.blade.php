@extends('layouts.app')

@if(auth()->user()->can('brand-create'))

@section('content')
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
                                            <button
                                                class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="p-0 modal-body">
                                            <div class="py-3 rounded-top-lg ps-4 pe-6 bg-light">
                                                <h4 class="mb-1" id="modalExampleDemoLabel">Add a new customer </h4>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <form action="{{ route('customers.store') }}" method="POST">
                                                    @csrf

                                                    <div class="mb-3">
                                                        <label class="col-form-label" for="recipient-name">Name </label>
                                                        <input class="form-control" name="customer_name" id="recipient-name"
                                                            type="text" />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="col-form-label"for="recipient-shop_name">Shop Name
                                                        </label>
                                                        <input class="form-control" name="customer_shop_name" id="recipient-shop_name" type="text" />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="col-form-label" for="recipient-phone"> Phone </label>
                                                        <input class="form-control" name="customer_phone"
                                                            id="recipient-phone" type="tel" />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="col-form-label" for="recipient-email">Email </label>
                                                        <input class="form-control" name="customer_email"
                                                            id="recipient-email" type="email" />
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                      <label class="col-form-label" for="recipient-account_holder"> Account Holder </label>
                                                      <input class="form-control" name="customer_account_holder"
                                                          id="recipient-account_holder" type="text" />
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                      <label class="col-form-label" for="recipient-account_number"> Account Number </label>
                                                      <input class="form-control" name="customer_account_number"
                                                          id="recipient-account_number" type="number" />
                                                    </div>

                                                    <div class="mb-3">
                                                      <label for="customer_type">Customer Bank Name</label>
                                                        <select class="form-select" id="customer_type" name='customer_type' >
                                                          <option selected="">Select one type </option>
                                                          <option value="type1">customer type1 </option>
                                                          <option value="type2">customer type2 </option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                      <label for="customer_bank_name">Customer Bank Name</label>

                                                      <select class="form-select" id="customer_bank_name" name='customer_bank_name' >
                                                            <option selected="">Select Bank Name </option>
                                                            <option value="bank1">bank1</option>
                                                            <option value="bank2">bank2</option>
                                                      </select>
                                                      
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="customer_adresse">Customer Adresse</label><br>
                                                        <textarea id="customer_adresse" name='customer_adresse' rows="3" cols="30"></textarea>
                                                    </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button"
                                                data-bs-dismiss="modal">Close</button>
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