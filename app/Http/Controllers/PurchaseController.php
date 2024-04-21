<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:purchase-list|purchase-create|purchase-edit|purchase-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:purchase-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:purchase-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:purchase-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases=Purchase::all();
        return view("purchases.index",compact("purchases"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("purchases.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            "purchase_date" =>"required",
            "purchase_nbr" =>"required",
            "purchase_status" =>"required",
            "purchase_type" =>"required",
        ]);

        Purchase::create($request->all());

        return redirect()->route('purchases.index')
            ->with('success', 'purchase create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        return view("purchases.show",compact("purchase"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        return view("purchases.edit",compact("purchase"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        request()->validate([
            "purchase_date" =>"required",
            "purchase_nbr" =>"required",
            "purchase_status" =>"required",
            "purchase_type" =>"required",
        ]);

        $purchase->update($request->all());

        return redirect()->route('purchases.index')
            ->with('success', 'purchase update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return redirect()->route('purchases.index')
            ->with('success', 'purchase delete successfully');
    }
}