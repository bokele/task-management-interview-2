<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Edit Project') }}
                </h2>
            </div>

        </div>
    </x-slot>

    <div class="flex py-12 mx-auto">
        <div class="w-3/5 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('task.index')
            </div>
        </div>
        <div class="w-2/5 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-10">

                <P
                    class="block text-lg font-semibold hs-tab-active:text-blue-600 text-gray-800 dark:hs-tab-active:text-blue-500 dark:text-neutral-200">
                    {{ $project->name }}</P>
                <P class="text-gray-600 text-md m-4">{{ $project->description }}</P>
                <P class="text-gray-600 text-md m-4">Created At : {{ $project->created_at }}</P>
                <P class="text-gray-600 text-md m-4">Last Update : {{ $project->updated_at }}</P>


            </div>
        </div>
    </div>
</x-app-layout>
