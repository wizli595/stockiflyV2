<?php

namespace App\Http\Controllers;

use App\Models\PurchaseDetail;
use Illuminate\Http\Request;

class PurchaseDetailController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:purchaseDetail-list|purchaseDetail-create|purchaseDetail-edit|purchaseDetail-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:purchaseDetail-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:purchaseDetail-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:purchaseDetail-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchaseDetails=PurchaseDetail::all();
        return view("purchaseDetails.index",compact('purchaseDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('purchaseDetails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(([
            "quantite" =>"required",
            "unite_cost" =>"required", 
            "total" =>"required",   
        ]));
        PurchaseDetail::create($request->all());
        return redirect()->route("purchaseDetails.index")->with("success","purchaseDetails create");
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseDetail $purchaseDetail)
    {
        return view('purchaseDetails.show',compact('purchaseDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseDetail $purchaseDetail)
    {
        return view('purchaseDetails.edit',compact('purchaseDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseDetail $purchaseDetail)
    {
        $request->validate(([
            "quantite" =>"required",
            "unite_cost" =>"required", 
            "total" =>"required",   
        ]));
        $purchaseDetail->update($request->all());
        return redirect()->route("purchaseDetails.index")->with("success","purchaseDetails updated");
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseDetail $purchaseDetail)
    {
        $purchaseDetail->delete();
        return redirect()->route("purchaseDetails.index")->with("success","purchaseDetails deleted");
    
    }
}
