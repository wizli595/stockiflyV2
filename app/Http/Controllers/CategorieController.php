<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:categorie-list|categorie-create|categorie-edit|categorie-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:categorie-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:categorie-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:categorie-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        $categories = Categorie::latest()->paginate(50);
        return $dataTable->render("categories.index",compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            "categorie_name" => "required",
        ]);

        Categorie::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'categorie created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        return view('categories.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        return view('categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        request()->validate([
            "categorie_name" => "required",
        ]);

        $categorie->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'categorie created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();

        return redirect()->route('categories.index')
            ->with('success', 'categorie deleted successfully');
    }
}
