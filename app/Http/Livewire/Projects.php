<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;

class Projects extends Component
{
    public $projects, $title, $description, $startDate, $project_id;
    public $updateMode = false;

    public function render()
    {
        $this->projects = Project::all();
        return view('livewire.projects');
    }

    // private function resetInputFields(){
    //     $this->title = '';
    //     $this->description = '';
    //     $this->startDate = '';
    // }

    public function storeProject()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'startDate' => 'required|date'
        ]);

        Project::create($validatedData);

        session()->flash('message', 'Projekts pievienots.');

        $this->resetInputFields();

        $this->emit('projectStore'); // Close model to using to jquery
    }

    public function editProject($id)
    {
        $this->updateMode = true;
        $project = Project::where('id',$id)->first();
        $this->project_id = $id;
        $this->title = $project->title;
        $this->description = $project->description;
        $this->startDate = $project->startDate;
    }

    public function cancelProject()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function updateProject()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'startDate' => 'required|date'
        ]);

        if ($this->project_id) {
            $project = Project::find($this->project_id);
            $project->update([
                'title' => $this->title,
                'description' => $this->description,
                'start' => $this->description,
                'startate' => $this->startDate,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Projekta informācija atjaunota.');
            $this->resetInputFields();
        }
    }

    public function deleteProject($id)
    {
        if($id){
            Project::where('id',$id)->delete();
            session()->flash('message', 'Projekts izdzēsts.');
        }
    }

}
