<?php

namespace App\Http\Controllers\dashboard;

use App\DataTables\ProductDataTable;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(UsersDataTable $usersDataTable) 
    {
        $user = Auth()->user() ;
        
        return $usersDataTable->render("dashboard", compact('user')); 

    }
}
