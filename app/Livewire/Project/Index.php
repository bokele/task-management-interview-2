<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function delete($id)
    {

        $project = Project::where('id', $id)->firstOrFail();
        if (auth()->id() != $project->user_id) {
            abort(401);
        }
        $project->delete();
        session()->flash('message', 'Project delete successfully.');
    }


    public function render()
    {

        $projects = Project::withCount(['tasks'])->where('user_id', auth()->id())->paginate(20);

        return view('livewire.project.index', compact('projects'));
    }
}
