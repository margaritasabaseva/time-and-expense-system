<?php

namespace App\Http\Controllers;

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
}
