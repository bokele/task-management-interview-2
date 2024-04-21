<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Collection;

class Dashbaord extends Component
{
    public Collection  $tasks;
    public  $project_name;

    public function showTask($project_id)
    {
    }

    public function updatedProjectName(): void
    {
        $this->tasks = Task::where([
            'user_id' => auth()->id(),
            'project_id' => $this->project_name,
        ])
            ->orderBy('priority')
            ->get();

        // dd($this->tasks);
    }

    public function render()
    {
        $totalProjects = Project::where('user_id', auth()->id())->count();
        $totalTasks = Task::where('user_id', auth()->id())->count();
        $projects = Project::where('user_id', auth()->id())->get();

        return view('livewire.dashbaord', compact('totalProjects', 'totalTasks', 'projects'));
    }
}
