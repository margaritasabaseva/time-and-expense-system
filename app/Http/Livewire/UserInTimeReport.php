<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserInTimeReport extends Component
{
    use WithPagination;
    public $name;
    public $jobTitle;
    public $userModelId;
    public $userTimeReportModalVisible = false;

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'jobTitle' => 'required',
        ];
    }

    public function mount()
    {
        // Resets pagination after reloading the page
        $this->resetPage();
    }

    public function readUser(){
        return User::paginate(3);
    }

    public function userModelData()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'jobTitle' => $this->jobTitle,
        ];
    }

    public function showUserTimeReport()
    {
        $this->validate();
        // User::find($this->userModelId)->update($this->userModelData());
        $this->userTimeReportModalVisible = false;
    }

    public function showUserTimeReportModal($id)
    {
        $this->resetValidation();
        $this->userModelId = $id;
        $this->userTimeReportModalVisible = true;
        $this->loadUserModel();
    }

    public function loadUserModel()
    {
        $users = User::find($this->userModelId);
        $this->name = $users->name;
        $this->email = $users->email;
        $this->jobTitle = $users->jobTitle;
    }

    public function render()
    {
        return view('livewire.manager.user-in-time-report', [
            'users' => $this->readUser()
        ]);
    }
}
