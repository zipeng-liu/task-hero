<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-xl font-medium {{ $task->completed ? 'line-through text-gray-500' : '' }}">{{ $task->title }}</h3>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $task->completed ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $task->completed ? 'Completed' : 'Pending' }}
                            </span>
                        </div>
                        <form action="{{ route('tasks.toggle-complete', $task) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ $task->completed ? 'Mark as Incomplete' : 'Mark as Complete' }}
                            </button>
                        </form>
                    </div>

                    @if ($task->due_date)
                        <div class="mb-4">
                            <p class="text-sm text-gray-600">Due Date:</p>
                            <p class="font-medium">{{ $task->due_date->format('F d, Y') }}</p>
                        </div>
                    @endif

                    @if ($task->description)
                        <div class="mb-4">
                            <p class="text-sm text-gray-600">Description:</p>
                            <div class="mt-1 p-4 bg-gray-50 rounded">
                                {{ $task->description }}
                            </div>
                        </div>
                    @endif

                    <div class="mt-8">
                        <a href="{{ route('tasks.index') }}" class="text-blue-500 hover:text-blue-700">
                            &larr; Back to Tasks
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>