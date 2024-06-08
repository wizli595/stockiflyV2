<?php

namespace App\Http\Controllers;

use App\DataTables\SupplierDataTable;
use App\Models\Supplier;
use App\Models\User;
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
    public function index(SupplierDataTable $dataTable)
    {
        $suppliers = Supplier::latest()->paginate(50);  
        $users = User::whereIn('id', $suppliers->pluck('user_id'))->get();
        return $dataTable->render("suppliers.index",compact('suppliers','users'));
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
    // Valider les données de la requête
    $request->validate([
        'supplier_shop_name' => 'required',
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' =>'required',
        
        'username' =>'required', 
        'phone' =>'required',
        'avatar' =>'required',
    ]); 

    try {
        // Créer l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => "stock manager", 
            'username' => $request->username,
            'phone' => $request->phone,
            'avatar' => $request->avatar
        ]);

        // Créer le fournisseur associé à l'utilisateur
        $supplier = new Supplier();
        $supplier->user_id = $user->id;
        $supplier->supplier_shop_name = $request->supplier_shop_name;
        $supplier->save();

        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully!');
    } catch (\Exception $e) {
        // En cas d'erreur, renvoyer à la page précédente avec un message d'erreur
        return back()->with('error', 'Error creating supplier: ' . $e->getMessage());
    }
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
    // Valider les données de la requête
    $request->validate([
        'supplier_shop_name' => 'required',
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $supplier->user->id,
        'role' => 'required',
        'username' => 'required',
        'phone' => 'required',
        'avatar' => 'required',
    ]);

    try {
        $supplier->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'username' => $request->username,
            'phone' => $request->phone,
            'avatar' => $request->avatar
        ]);

        // Mettre à jour les autres champs du fournisseur
        $supplier->update([
            'supplier_shop_name' => $request->supplier_shop_name,
        ]);
        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully!');
    } catch (\Exception $e) {
        // En cas d'erreur, renvoyer à la page précédente avec un message d'erreur
        return back()->with('error', 'Error updating supplier: ' . $e->getMessage());
    }
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
