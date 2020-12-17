<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function indexUsers()
    {
        $users = User::with('roles')->get();
        return view('admin.users', ['users' => $users]);
    }

    public function indexRegister()
    {
        return view('admin.register');
    }


//     public function isAdmin(){
//         $userRoles = Auth::user()->roles->pluck('name');
//         dd($userRoles);
//         return $userRoles;
//     }

    // public function isAdmin($role)
    // {
    //     $roles = $this->roles->where('name', $role)->count();

    //     if ($roles == 1) {
    //         return true;
    //     }
    //     return false;
    // }

    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:ROLE_ADMIN');
    // }
}
