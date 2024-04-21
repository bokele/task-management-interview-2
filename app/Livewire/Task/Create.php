<?php

namespace App\Livewire\Task;

use App\Livewire\Forms\TaskForm;
use App\Models\Project;
use Livewire\Component;

class Create extends Component
{

    public TaskForm $form;

    public function save()
    {

        $this->form->store();
        session()->flash('message', 'Task added successfully.');
        return to_route('tasks.index');
    }

    public function render()
    {
        $projects = Project::where('user_id', auth()->id())->orderBy('name', 'asc')->get();
        return view('livewire.task.create', compact('projects'));
    }
}
