<?php

namespace App\Http\Controllers;

use App\Models\Werhouse;
use Illuminate\Http\Request;

class WerhouseController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:werhouse-list|werhouse-create|werhouse-edit|werhouse-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:werhouse-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:werhouse-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:werhouse-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("werhouses.index",compact('werhouses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("werhouses.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            "werhouse_name" =>"required",
            "werhouse_adresse" =>"required",
            "werhouse_capacity" =>"required",

        ]);
        Werhouse::create($request->all());
        return redirect()->route("werhouses.index")->with("success","werhous create");
    }

    /**
     * Display the specified resource.
     */
    public function show(Werhouse $werhouse)
    {
        return view("werhouses.show",compact("werhouse"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Werhouse $werhouse)
    {
        return view("werhouses.edit",compact("werhouse"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Werhouse $werhouse)
    {
        request()->validate([
            "werhouse_name" =>"required",
            "werhouse_adresse" =>"required",
            "werhouse_capacity" =>"required",
        ]);
        $werhouse->update($request->all());
        return redirect()->route("werhouses.index")->with("success","werhous updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Werhouse $werhouse)
    {
        $werhouse->delete();
        return redirect()->route("werhouses.index")->with("success","werhous deleted");
    }
}
