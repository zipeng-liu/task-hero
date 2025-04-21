<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Welcome to Task Hero!</h3>
                    
                    <div class="mb-6">
                        <p>Your personal task management application.</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-blue-50 p-6 rounded-lg shadow">
                            <h4 class="font-medium text-blue-800 mb-2">Quick Stats</h4>
                            <div class="text-sm">
                                <p>Total tasks: {{ App\Models\Task::where('user_id', Auth::id())->count() }}</p>
                                <p>Completed tasks: {{ App\Models\Task::where('user_id', Auth::id())->where('completed', true)->count() }}</p>
                                <p>Pending tasks: {{ App\Models\Task::where('user_id', Auth::id())->where('completed', false)->count() }}</p>
                            </div>
                        </div>
                        
                        <div class="bg-green-50 p-6 rounded-lg shadow">
                            <h4 class="font-medium text-green-800 mb-2">Quick Actions</h4>
                            <div class="space-y-2">
                                <a href="{{ route('tasks.index') }}" class="block text-blue-500 hover:text-blue-700">View all tasks</a>
                                <a href="{{ route('tasks.create') }}" class="block text-blue-500 hover:text-blue-700">Create new task</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>