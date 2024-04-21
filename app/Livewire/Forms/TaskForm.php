<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Str;

class TaskForm extends Form
{
    public ?Task $task;

    public $name = '';
    public $project_name = '';
    public $slug = '';

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'project_name' => ['required',],
        ];
    }

    public function setTask(Task $task)
    {
        $this->task = $task;

        $this->name = $task->name;
        $this->project_name = $task->project_id;
    }

    public function store()
    {
        $this->validate();

        $priority = Task::where('user_id', auth()->id())->max('priority');

        Task::create([
            'user_id' => auth()->id(),
            'slug' => Str::slug($this->name) . time(),
            'name' => $this->name,
            'project_id' => $this->project_name,
            'priority' => $priority + 1

        ]);

        $this->reset();
    }


    public function update()
    {
        $this->validate();

        $this->task->update([
            'slug' => Str::slug($this->name) . time(),
            'name' => $this->name,
            'project_id' => $this->project_name,

        ]);

        $this->reset();
    }
}
