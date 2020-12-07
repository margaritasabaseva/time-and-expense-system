<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    public $name;
    public $email;
    public $jobTitle;
    public $phone;
    public $address;
    // public $roles;
    public $userModelId;
    public $userModalFormVisible = false;
    public $confirmDeleteUserVisible = false;

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'jobTitle' => 'required',
            'phone' => 'required',
            // 'address' => 'required',
            // 'role' => 'required',
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
            'jobTitle' => $this->jobTitle,
            'phone' => $this->phone,
            'address' => $this->address,
            // 'roles' => $this->roles,
        ];
    }

    public function updateUser()
    {
        $this->validate();
        User::find($this->userModelId)->update($this->userModelData());
        $this->userModalFormVisible = false;
    }

    public function updateUserModal($id)
    {
        $this->resetValidation();
        $this->userModelId = $id;
        $this->userModalFormVisible = true;
        $this->loadUserModel();
        // $this->resetVars();
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
        $data = User::find($this->userModelId);
        $this->name = $data->name;
        $this->email = $data->email;
        $this->jobTitle = $data->jobTitle;
        $this->phone = $data->phone;
        $this->address = $data->address;
        // $this->roles = $data->role;
        // dd($this);
    }

    public function resetVars()
    {
        $this->userModelId = null;
        $this->name = null;
        $this->email = null;
        $this->jobTitle = null;
        $this->phone = null;
        $this->address = null;
        $this->roles = null;
    }

    public function render()
    {
        // $users = User::with('roles')->get();
        // return view('admin/users', ['users' => $users]);
        // return view('livewire.users',[
        //     'data' => $this->readUser(),
        // ]);
        // return view('livewire.users', ['users' => $users]);
        return view('livewire.users', ['data' => $this->readUser()]);
    }
}
