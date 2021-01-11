<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Role;
use App\Services\RolesStateService;
use App\ValueObjects\RolesWithStatesVo;
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
    public $roles;
    public $user;

    public $userModelId;
    public $userModalFormVisible = false;
    public $assignRolesVisible = false;
    public $updatePasswordVisible = false;
    public $confirmDeleteUserVisible = false;

    public $perPage = 5;
    public $sortBy = 'name';
    public $sortDirection = 'asc';
    public $search = '';


    // User Methods

    public function rules()
    {
        return [
            'name' => 'required|max:120',
            'email' => 'required|email|max:120|unique:users',
            'job_title' => 'required|max:255',
            'phone' => 'required|numeric|digits_between:1,15',
            'password' => 'required|min:8|max:120',
            'address' => 'nullable|max:255',
        ];
    }

    public function mount()
    {
        $this->resetPage();
    }

    public function createUser()
    {
        $this->validate();
        User::create($this->userModelData());
        $this->userModalFormVisible = false;
        $this->resetVars();
        session()->flash('successCreateUser', 'Lietotājs veiksmīgi pievienots.');
    }

    public function createUserModal()
    {
        $this->resetValidation();
        $this->resetVars();
        $this->userModalFormVisible = true;
    }

    public function readUser()
    {
        return User::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
    }

    public function userModelData()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'job_title' => $this->job_title,
            'phone' => $this->phone,
            'address' => $this->address,
            'password' => Hash::make($this->password),
        ];
    }

    public function userModelPassword()
    {
        return [
            'password' => Hash::make($this->password),
        ];
    }

    public function updatePassword()
    {
        $this->validateOnly('password');
        User::find($this->userModelId)->update($this->userModelPassword());
        $this->updatePasswordVisible = false;
        $this->resetPage();
        session()->flash('successUpdatePassword', 'Lietotāja parole nomainīta.');
    }

    public function updatePasswordModal($id)
    {
        $this->userModelId = $id;
        $this->updatePasswordVisible = true;
        $this->loadUserModel($id);
    }

    public function deleteUser()
    {
        User::destroy($this->userModelId);
        $this->confirmDeleteUserVisible = false;
        $this->resetPage();
        session()->flash('successDeleteUser', 'Lietotājs izdzēsts.');
    }

    public function deleteUserModal($id)
    {
        $this->userModelId = $id;
        $this->confirmDeleteUserVisible = true;
        $this->loadUserModel($id);
    }

    public function loadUserModel($id)
    {
        $users = User::find($id);
        $this->user = $users;
        $this->name = $users->name;
        $this->email = $users->email;
        $this->job_title = $users->job_title;
        $this->phone = $users->phone;
        $this->address = $users->address;

        $mainRoles = Role::all();
        $userRoles = $users->roles;
        $checkedRoles = RolesStateService::changeRolesStateFromUser($mainRoles, $userRoles);
        $this->roles = $checkedRoles;
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


    // Role Methods

    public function assignRoles()
    {
        /** From array to object **/
        $rolesWithStates = RolesWithStatesVo::fromArray($this->roles);

        /** Save to database */
        $this->user->updateRolesFromStatesVo($rolesWithStates);
        $this->assignRolesVisible = false;
        session()->flash('successAssignRoles', 'Lomas saglabātas.');
    }

    public function assignRolesModal($id)
    {
        $this->assignRolesVisible = true;
        $this->loadUserModel($id);
    }


    // Sorting, Search and Rendering

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.users', [
            'users' => $this->readUser()
        ]);
    }
}
