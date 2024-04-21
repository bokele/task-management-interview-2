<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Illuminate\Support\Collection;
use Livewire\Component;

class Index extends Component
{
    public Collection $tasks;

    public function render()
    {
        $this->tasks = Task::where('user_id', auth()->id())->orderBy('priority')->get();

        return view('livewire.task.index');
    }

    public function delete($id)
    {
        Task::where('id', $id)->delete();
        session()->flash('message', 'Task delete successfully.');
    }

    public function updateOrder($list): void
    {
        foreach ($list as $item) {
            $task = $this->tasks->firstWhere('id', $item['value']);

            if ($task['priority'] != $item['order']) {
                Task::where('id', $item['value'])->update(['priority' => $item['order']]);
            }
        }
    }
}
