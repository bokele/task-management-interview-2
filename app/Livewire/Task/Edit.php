<?php

namespace App\Livewire\Task;

use App\Livewire\Forms\TaskForm;
use App\Models\Project;
use App\Models\Task;
use Livewire\Component;

class Edit extends Component
{



    public Task $task;
    public TaskForm $form;

    public function mount()
    {
        $this->form->setTask($this->task);
    }

    public function save()
    {
        $this->form->update();
        session()->flash('message', 'Task update successfully.');
        return to_route('tasks.index');
    }
    public function render()
    {

        $projects = Project::where('user_id', auth()->id())->orderBy('name', 'asc')->get();
        return view('livewire.task.edit', compact('projects'));
    }
}
