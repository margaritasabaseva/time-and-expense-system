<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function indexUsers()
    {
        $users = User::with('roles')->get();
        return view('admin.users', [
            'users' => $users
        ]);
    }
}
