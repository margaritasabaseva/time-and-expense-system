<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\WorkingHour;
use App\Services\TimeReportService;
use Livewire\Component;
use Livewire\WithPagination;

class TimeReports extends Component
{
    use WithPagination;

    const NO_HOURS_RECORDED = 'Darbinieks izvēlētajā mēnesī nav reģistrējis nostrādātās darba stundas.';
    const CHOOSE_VALID_DATE = 'Lūdzu, izvēlēties darba stundu atskaites datumu.';

    public $name;
    public $email;
    public $job_title;

    public $userModelId;
    public $userTimeReportModalVisible = false;

    public $perPage = 5;
    public $sortBy = 'name';
    public $sortDirection = 'asc';
    public $search = '';

    public $reportMonth;
    public $reportYear;
    public $user;
    public $userReportData;

    public $noHoursMessage = self::CHOOSE_VALID_DATE;

    protected $listeners = [
        'dateChanged' => 'dateChanged'
    ];

    public function dateChanged()
    {
        if (is_null($this->reportMonth) || is_null($this->reportYear)) {
            $this->noHoursMessage = self::CHOOSE_VALID_DATE;
            return;
        }

        $userWorkingHours = WorkingHour::getByUserAndDate($this->user, $this->reportMonth, $this->reportYear);
        if ($userWorkingHours->count() <= 0) {
            $this->noHoursMessage = self::NO_HOURS_RECORDED;
        }
        $timeReportService = new TimeReportService();
        $this->userReportData = $timeReportService->hoursPerMonthFromCollection($userWorkingHours);
    }

    public function clearVars()
    {
        $this->noHoursMessage = self::CHOOSE_VALID_DATE;
        $this->userReportData = [];
        $this->reportMonth = null;
        $this->reportYear = null;
    }

    public function mount()
    {
        $this->resetPage();
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
        ];
    }

    public function showUserTimeReport()
    {
        $this->validate();
        $this->userTimeReportModalVisible = false;
    }

    public function showUserTimeReportModal($id)
    {
        $this->clearVars();
        $this->resetValidation();
        $this->userModelId = $id;
        $this->user = User::find($id);
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
        return view('livewire.manager.time-report', [
            'users' => $this->readUser()
        ]);
    }
}
