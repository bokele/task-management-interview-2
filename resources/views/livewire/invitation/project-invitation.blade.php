<div>
    <div class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-10">
        <div class="flex justify-between max-w-2xl mx-auto text-center mb-10 lg:mb-14">

            <h2 class="text-xl font-bold md:text-xl md:leading-tight dark:text-white">Project Members</h2>
            @if (auth()->id() == $this->project->user_id)
                <div class="flex justify-end">
                    <button type="button" wire:click="$toggle('showModal')"
                        class="w-46 py-2 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium  bg-indigo-700 text-gray-100 shadow-sm hover:bg-indigo-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                        Invate Collaborator
                    </button>
                </div>
            @endif

        </div>
        <div class="grid grid-cols-2 lg:grid-cols-2 gap-8 md:gap-12">
            <div class="grid sm:flex sm:items-center gap-y-3 gap-x-4">
                <img class="rounded-full size-8" src="{{ $project->user->avatar() }}" alt=" {{ $project->user->name }}">
                <div class="sm:flex sm:flex-col ">

                    <h3 class="font-medium text-gray-800 dark:text-neutral-200">
                        {{ $project->user->name }}
                    </h3>

                </div>
            </div>

            @foreach ($project->members as $member)
                <div class="grid sm:flex sm:items-center gap-y-3 gap-x-4">
                    <a href="#"
                        class="flex item-center text-gray-800 font-medium dark:text-neutral-200 hover:text-indigo-600 hover:font-semibold"
                        wire:click="delete({{ $member->id }})"
                        wire:confirm="Are you sure you want to remove this colabotor?">
                        <img class="rounded-full size-8" src="{{ $member->avatar() }}" alt="{{ $member->name }}">
                        <div class="sm:flex sm:flex-col sm:h-full">
                            <div class="flex items-center ml-2">
                                <h3 class="flex mt-1">
                                    {{ $member->name }}

                                </h3>

                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>

        @include('livewire.invitation.invitate-modal')

    </div>
