<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:brand-list|brand-create|brand-edit|brand-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:brand-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:brand-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:brand-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands=Brand::all();
        return view("brands.index",compact("brands"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("brands.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            "brand_name"=>"required"
        ]);
        Brand::create($request->all());
        return redirect()->route("brands.index")->with("success","brand created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view("brands.show",compact("brand"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        request()->validate([
            "brand_name"=>"required"
        ]);
        $brand->update($request->all());
        return redirect()->route("brands.index")->with("success","brand update successfully.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route("brands.index")->with("success","brand delete successfully.");
    }
}
