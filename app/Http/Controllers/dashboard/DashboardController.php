<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'users_count' => User::count(),
            // Add other models 
        ];

        return view('dashboard', compact('data'));
    }
}
