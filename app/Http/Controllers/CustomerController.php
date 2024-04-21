<?php

namespace App\Http\Controllers;

use App\DataTables\CustomerDataTable;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:customer-list|customer-create|customer-edit|customer-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:customer-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:customer-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:customer-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(CustomerDataTable $dataTable)
    {
        $customers = Customer::latest()->paginate(50);
        return $dataTable->render('custumers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            "customer_name" => "required",
            "customer_email" => "required",
            "customer_phone" => "required",
            "customer_adresse" => "required",
            "customer_shop_name" => "required",
            "customer_type" => "required",
            "customer_bank_name" => "required",
            "customer_account_holder" => "required",
            "customer_account_number" => "required",
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        request()->validate([
            "customer_name" => "required",
            "customer_email" => "required",
            "customer_phone" => "required",
            "customer_adresse" => "required",
            "customer_shop_name" => "required",
            "customer_type" => "required",
            "customer_bank_name" => "required",
            "customer_account_holder" => "required",
            "customer_account_number" => "required",
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('success', 'customer deleted successfully');
    }
}
