<?php

namespace App\Http\Controllers\dashboard;

use App\DataTables\ProductDataTable;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(UsersDataTable $usersDataTable)
    {
        $users_count = User::count() ;
        
        return $usersDataTable->render("dashboard", compact('users_count')); 

    }
}
