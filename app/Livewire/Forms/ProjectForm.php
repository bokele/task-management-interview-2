<?php

namespace App\Livewire\Forms;

use App\Models\Project;
use Illuminate\Support\Str;
use Livewire\Form;

class ProjectForm extends Form
{
    public ?Project $project;

    public $name = '';

    public $slug = '';

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    public function setProject(Project $project)
    {
        $this->project = $project;

        $this->name = $project->name;
        $this->slug = $project->slug;
    }

    public function store()
    {
        $this->validate();

        Project::create([
            'user_id' => auth()->id(),
            'slug' => Str::slug($this->name) . time(),
            'name' => $this->name,

        ]);

        $this->reset();
    }


    public function update()
    {
        $this->validate();

        $this->project->update([
            'slug' => Str::slug($this->name) . time(),
            'name' => $this->name,

        ]);

        $this->reset();
    }
}
