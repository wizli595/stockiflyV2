<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;


class UserController extends Controller
{
    public function __construct() {
        $this->middleware(['permission:brand-create'], ['only' => ['index', 'show']]);
    }

    public function index(UsersDataTable $dataTable)
    {
        // $data = User::latest()->paginate(5);
        // return view('users.index',compact('data'));
        return $dataTable->render("users.index");
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
    
    // Role Controlling 
    public function showChangeRolesPermissions(User $user){

        $roles = Role::all(); // Get all roles
        $permissions = Permission::all(); // Get all permissions

        // Get the roles and permissions of the user
        $userRoles = $user->roles->pluck('id')->toArray();
        $userPermissions = $user->permissions->pluck('id')->toArray();

        return view('users.change_roles_permissions', compact('user', 'roles', 'permissions', 'userRoles', 'userPermissions'));
    }

    public function updateRolesPermissions(Request $request,User $user)
    {
        // $user = User::find($id);
        
        // Validate the request
        $this->validate($request, [
            'roles' => 'required|array',
            'permissions' => 'required|array',
        ]);
        
        // Sync roles and permissions
        $user->syncRoles($request->roles);
        $user->syncPermissions($request->permissions);

        return redirect()->route('users.index')
                        ->with('success', 'Roles and permissions updated successfully');
    }
}
