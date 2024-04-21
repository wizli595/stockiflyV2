<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:supplier-list|supplier-create|supplier-edit|supplier-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:supplier-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:supplier-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:supplier-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::latest()->paginate(50);
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
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
            "supplier_name" => "required",
            "supplier_email" => "required",
            "supplier_phone" => "required",
            "supplier_adresse" => "required",
            "supplier_shop_name" => "required",
            "supplier_type" => "required",
            "supplier_bank_name" => "required",
            "supplier_account_holder" => "required",
            "supplier_account_number" => "required",
        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')
            ->with('success', 'supplier created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        request()->validate([
            "supplier_name" => "required",
            "supplier_email" => "required",
            "supplier_phone" => "required",
            "supplier_adresse" => "required",
            "supplier_shop_name" => "required",
            "supplier_type" => "required",
            "supplier_bank_name" => "required",
            "supplier_account_holder" => "required",
            "supplier_account_number" => "required",
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')
            ->with('success', 'supplier updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')
            ->with('success', 'supplier deleted successfully');
    }
}
