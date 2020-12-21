<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserInTimeReport extends Component
{
    use WithPagination;
    public $name;
    public $email;
    public $job_title;

    public $userModelId;
    public $userTimeReportModalVisible = false;

    public $perPage = 5;
    public $sortBy = 'name';
    public $sortDirection = 'asc';
    public $search = '';

    public function mount()
    {
        // Resets pagination after reloading the page
        $this->resetPage();
    }

    public function readUser(){
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
        $this->job_title = $users->job_title;
    }

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }

    public function render()
    {
        return view('livewire.manager.user-in-time-report', [
            'users' => $this->readUser()
        ]);
    }
}
