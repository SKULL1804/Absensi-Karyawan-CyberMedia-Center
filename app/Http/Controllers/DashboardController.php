<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Position;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            "title" => "Dashboard",
            "link" => "Home",
            "positionCount" => Position::count(),
            "userCount" => User::count()
        ]);
    }
}
