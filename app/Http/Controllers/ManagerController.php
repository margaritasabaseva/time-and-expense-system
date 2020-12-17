<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManagerController extends Controller
{
    public function indexProjects()
    {
        return view('manager.projects');
    }

    public function indexTimeReport()
    {
        return view('manager.time-reports');
    }

    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:ROLE_MANAGER');
    // }
}
