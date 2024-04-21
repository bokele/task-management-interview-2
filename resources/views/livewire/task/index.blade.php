<div class="p-4">
    <table class="w-full  p-4 table-auto border-collapse border-2 border-gray-500 mb-4">
        <thead>
            <tr>
                <th class="border border-gray-400 px-4 py-2 text-gray-800">#</th>

                <th class="border border-gray-400 px-4 py-2 text-gray-800">Project</th>
                <th class="border border-gray-400 px-4 py-2 text-gray-800">Task</th>
                <th class="border border-gray-400 px-4 py-2 text-gray-800">Priority</th>
                <th class="border border-gray-400 px-4 py-2 text-gray-800">Actions</th>
            </tr>
        </thead>
        <tbody wire:sortable="updateOrder">
            @forelse ($tasks as $task)
                <tr wire:sortable.handle wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">

                    <td class="border border-gray-400 px-4 py-2">{{ $task->priority }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ Str::title($task->project->name) }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ Str::title($task->name) }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $loop->iteration }}</td>

                    <td class="border border-gray-400 px-4 py-2">
                        <a href="{{ route('tasks.edit', $task->id) }}"
                            class=" justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Edit
                        </a>
                        <button wire:click="delete({{ $task->id }})"
                            wire:confirm="Are you sure you want to delete this project?"
                            class="ml-2 justify-center rounded-md bg-red-600 px-3 py-1 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                            Delete
                        </button>
                    </td>

                </tr>
            @empty
                <tr>
                    <td class="border border-gray-400 px-4 py-2 text-center" colspan="5"> Not Data, add a task</td>


                </tr>
            @endforelse




        </tbody>
    </table>

</div>
