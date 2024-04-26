<?php

namespace App\Http\Controllers;

use App\DataTables\CustomerDataTable;
use App\Models\Adresse;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        // $users = $customers->pluck('user')->unique();
        $users = User::whereIn('id', $customers->pluck('user_id'))->get();
        return $dataTable->render('customers.index',compact('customers','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("customers.create");
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,',
            'password' =>'required',
            'username' =>'required',
            'phone' =>'required',
            'avatar' =>'required'

        ]);
        // Commencer une transaction pour garantir que l'utilisateur et l'adresse sont créés en même temps
        DB::beginTransaction();

        try {
            // Créer l'utilisateur
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'stock Manager',
                'username' => $request->username,
                'phone' => $request->phone,
                'avatar' => "jojo"
            ]);

            // Créer l'adresse
            $adresse = Adresse::create([
                'adresse_name' =>$request->adresse_name
            ]);
            $customer = new Customer();
            $customer->user_id = $user->id;
            $customer->adresse_id = $adresse->id;
            $customer->save();
            dd($customer) ;

            // Valider la transaction
            DB::commit();


            return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
        } catch (\Exception $e) {
            // En cas d'erreur, annuler la transaction
            dd($e) ;
            DB::rollback();

            return back()->with('error', 'Error creating customer: ' . $e->getMessage());
        }
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
    // Valider les données de la requête
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $customer->user->id,
        'password' => 'same:confirm-password',
        'role' => 'required',
        'username' => 'required',
        'phone' => 'required',
        'avatar' => 'required',
        'adresse_name' => 'required'
    ]);

    // Commencer une transaction pour garantir que les mises à jour sont effectuées de manière cohérente
    DB::beginTransaction();

    try {
        // Mettre à jour les données de l'utilisateur associé au client
        $customer->user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'username' => $request->username,
            'phone' => $request->phone,
            'avatar' => $request->avatar
        ]);

        // Mettre à jour l'adresse associée au client
        $customer->adresse->update([
            'adresse_name' => $request->adresse_name
        ]);

        // Valider la transaction
        DB::commit();

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    } catch (\Exception $e) {
        // En cas d'erreur, annuler la transaction
        DB::rollback();

        return back()->with('error', 'Error updating customer: ' . $e->getMessage());
    }
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
