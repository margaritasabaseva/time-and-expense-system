<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;

class Projects extends Component
{
    use WithPagination;
    public $title;
    public $description;
    public $responsibleManager;
    public $startDate;
    // public $project_id;
    public $modelId;
    public $modalFormVisible = false;
    public $confirmDeleteModalVisible = false;

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'responsibleManager' => 'required',
            'startDate' => 'required',
        ];
    }

    public function mount()
    {
        // Resets pagination after reloading the page
        $this->resetPage();
    }

    public function createProject()
    {
        $this->validate();
        Project::create($this->modelData());
        $this->modalFormVisible = false;
        $this->resetVars();
    }

    public function createShowModal()
    {
        $this->resetValidation();
        $this->resetVars();
        $this->modalFormVisible = true;
    }

    public function readProject(){
        return Project::paginate(5);
    }

    public function modelData()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'responsibleManager' => $this->responsibleManager,
            'startDate' => $this->startDate,
        ];
    }

    public function updateProject()
    {
        $this->validate();
        Project::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
        // $this->resetVars();
    }

   public function deleteShowModal($id)
   {
        $this->modelId = $id;
        $this->confirmDeleteModalVisible = true;
   }

    public function loadModel()
    {
        $data = Project::find($this->modelId);
        $this->title = $data->title;
        $this->description = $data->description;
        $this->responsibleManager = $data->responsibleManager;
        $this->startDate = $data->startDate;
    }

    public function resetVars()
    {
        $this->modelId = null;
        $this->title = null;
        $this->description = null;
        $this->responsibleManager = null;
        $this->startDate = null;
    }

    public function render()
    {
        // $this->projects = Project::all();
        return view('livewire.projects',[
            'data' => $this->readProject(),
        ]);
    }


    // private function resetInputFields(){
    //     $this->title = '';
    //     $this->description = '';
    //     $this->startDate = '';
    // }

    // public function storeProject()
    // {
    //     $validatedData = $this->validate([
    //         'title' => 'required',
    //         'description' => 'required',
    //         'startDate' => 'required|date'
    //     ]);

    //     Project::create($validatedData);

    //     session()->flash('message', 'Projekts pievienots.');

    //     $this->resetInputFields();

    //     $this->emit('projectStore'); // Close model to using to jquery
    // }

    // public function editProject($id)
    // {
    //     $this->updateMode = true;
    //     $project = Project::where('id',$id)->first();
    //     $this->project_id = $id;
    //     $this->title = $project->title;
    //     $this->description = $project->description;
    //     $this->startDate = $project->startDate;
    // }

    // public function cancelProject()
    // {
    //     $this->updateMode = false;
    //     $this->resetInputFields();
    // }

    // public function updateProject()
    // {
    //     $validatedData = $this->validate([
    //         'title' => 'required',
    //         'description' => 'required',
    //         'startDate' => 'required|date'
    //     ]);

    //     if ($this->project_id) {
    //         $project = Project::find($this->project_id);
    //         $project->update([
    //             'title' => $this->title,
    //             'description' => $this->description,
    //             'start' => $this->description,
    //             'startate' => $this->startDate,
    //         ]);
    //         $this->updateMode = false;
    //         session()->flash('message', 'Projekta informācija atjaunota.');
    //         $this->resetInputFields();
    //     }
    // }

    // public function deleteProject($id)
    // {
    //     if($id){
    //         Project::where('id',$id)->delete();
    //         session()->flash('message', 'Projekts izdzēsts.');
    //     }
    // }

}
