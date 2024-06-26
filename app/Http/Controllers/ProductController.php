<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\DataTables\UsersDataTable;
use App\Models\Brand;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Unite;
use App\Models\User;
use App\Models\Werhouse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:product-list|product-create|product-edit|product-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:product-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:product-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:product-delete'], ['only' => ['destroy']]);
    }
    /** 
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    { 
        $products=Product::all();
        $categories=Categorie::all();
        $werhouses=Werhouse::all();
        $brands=Brand::all();
        $unites=Unite::all();
        
        return $dataTable->render("products.index",compact('products','categories','werhouses','brands','unites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            "product_name" =>"required",
            "product_code" =>"required",
            "buying_price" =>"required",
            "selling_price" =>"required",
            "stock" =>"required",
            "product_image" =>"required",
            "categorie_id" =>"required",
            "werhouse_id" =>"required",
            "brand_id" =>"required",
            "unite_id" =>"required",

        ]);
        Product::create($request->all());
        return redirect()->route("products.index")->with("success","product create");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("products.show",compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product=$product ; 
        $categories=Categorie::all();
        $werhouses=Werhouse::all();
        $brands=Brand::all();
        $unites=Unite::all();

        return view("products.edit",compact('product','categories','werhouses','brands','unites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        request()->validate([
            "product_name" =>"required",
            "product_code" =>"required",
            "buying_price" =>"required",
            "selling_price" =>"required",
            "stock" =>"required",
            "product_image" =>"required",
            "categorie_id" =>"required",
            "werhouse_id" =>"required",
            "brand_id" =>"required",
            "unite_id" =>"required",

        ]);
        $product->update($request->all());
        return redirect()->route("products.index")->with("success","product updated");

    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("products.index")->with("success","product deleted");
    }
}
