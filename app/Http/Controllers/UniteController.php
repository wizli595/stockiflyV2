<?php

namespace App\Http\Controllers;

use App\Models\Unite;
use Illuminate\Http\Request;

class UniteController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:unite-list|unite-create|unite-edit|unite-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:unite-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:unite-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:unite-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unites=Unite::all();
        return view("unites.index",compact("unites"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("unites.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            "unite_name" =>"required",

        ]);
        Unite::create($request->all());
        return redirect()->route("unites.index")->with("success","unite create");
    }

    /**
     * Display the specified resource.
     */
    public function show(Unite $unite)
    {
        return view("unites.show",compact("unite"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unite $unite)
    {
        return view("unites.edit",compact("unite"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unite $unite)
    {
        request()->validate([
            "unite_name" =>"required",

        ]);
        $unite->update($request->all());
        return redirect()->route("unites.index")->with("success","unite updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unite $unite)
    {
        $unite->delete();
        return redirect()->route("unites.index")->with("success","unite deleted");
    }
}
