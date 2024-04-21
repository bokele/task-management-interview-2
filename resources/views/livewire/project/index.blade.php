<div class="p-4">
    <table class="w-full  p-4 table-auto border-collapse border-2 border-gray-500 mb-4">
        <thead>
            <tr>
                <th class="border border-gray-400 px-4 py-2 text-gray-800">#</th>
                <th class="border border-gray-400 px-4 py-2 text-gray-800">Project</th>
                <th class="border border-gray-400 px-4 py-2 text-gray-800">Tasks</th>
                <th class="border border-gray-400 px-4 py-2 text-gray-800">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td class="border border-gray-400 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ Str::title($project->name) }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $project->tasks_count }}</td>
                    <td class="border border-gray-400 px-4 py-2">
                        <a href="{{ route('projects.edit', $project->id) }}"
                            class=" justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Edit
                        </a>
                        <button wire:click="delete({{ $project->id }})"
                            wire:confirm="Are you sure you want to delete this project?"
                            class="ml-2 justify-center rounded-md bg-red-600 px-3 py-1 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                            Delete
                        </button>
                    </td>

                </tr>
            @endforeach


        </tbody>
    </table>
    {{ $projects->links() }}
</div>
