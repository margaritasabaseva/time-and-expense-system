<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    use WithPagination;
    public $name;
    public $email;
    public $job_title;
    public $phone;
    public $address;
    public $password;
    // public $roles;
    public $userModelId;
    public $userModalFormVisible = false;
    public $assignRolesVisible = false;
    public $confirmDeleteUserVisible = false;

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'job_title' => 'required',
            'phone' => 'required|numeric',
            'password' => 'required|min:8',
        ];
    }

    public function mount()
    {
        // Resets pagination after reloading the page
        $this->resetPage();
    }

    public function createUser()
    {
        $this->validate();
        User::create($this->userModelData());
        $this->userModalFormVisible = false;
        $this->resetVars();
    }

    public function createUserModal()
    {
        $this->resetValidation();
        $this->resetVars();
        $this->userModalFormVisible = true;
    }

    public function readUser(){
        return User::paginate(5);
    }

    public function userModelData()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'job_title' => $this->job_title,
            'phone' => $this->phone,
            'address' => $this->address,
            'password' =>Hash::make($this->password),
        ];
    }

    public function assignRoles()
    {
        $this->assignRolesVisible = false;
    }

    public function assignRolesModal($id)
    {
        $this->userModelId = $id;
        $this->assignRolesVisible = true;
    }
    
    public function loadUserRoles()
    {
        $roles = Role::find($this->userModelId);
    }


    public function deleteUser(){
        User::destroy($this->userModelId);
        $this->confirmDeleteUserVisible = false;
        $this->resetPage();
    }

   public function deleteUserModal($id)
   {
        $this->userModelId = $id;
        $this->confirmDeleteUserVisible = true;
   }

    public function loadUserModel()
    {
        $users = User::find($this->userModelId);
        $this->id = $users->id;
        $this->name = $users->name;
        $this->email = $users->email;
        $this->job_title = $users->job_title;
        $this->phone = $users->phone;
        $this->address = $users->address;
        $this->loadUserRoles();
    }

    public function resetVars()
    {
        $this->userModelId = null;
        $this->name = null;
        $this->email = null;
        $this->job_title = null;
        $this->phone = null;
        $this->address = null;
        $this->roles = null;
        $this->password = null;
    }

    public function render()
    {
        return view('livewire.admin.users', [
            'users' => $this->readUser()
        ]);
    }
}
