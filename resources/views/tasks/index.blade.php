<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
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
                        <h3 class="text-lg font-medium">Your Tasks</h3>
                        <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add New Task
                        </a>
                    </div>

                    @if ($tasks->count())
                        <div class="divide-y">
                            @foreach ($tasks as $task)
                                <div class="py-4 flex items-center justify-between">
                                    <div class="flex items-center">
                                        <form action="{{ route('tasks.toggle-complete', $task) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="mr-3">
                                                @if ($task->completed)
                                                    <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                    </svg>
                                                @else
                                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <circle cx="12" cy="12" r="10" stroke-width="2" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </form>
                                        <div>
                                            <a href="{{ route('tasks.show', $task) }}" class="text-lg font-medium {{ $task->completed ? 'line-through text-gray-500' : '' }}">
                                                {{ $task->title }}
                                            </a>
                                            @if ($task->due_date)
                                                <p class="text-sm text-gray-500">Due: {{ $task->due_date->format('M d, Y') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-500">You don't have any tasks yet. Create one!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>