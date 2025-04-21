<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->orderBy('completed')->orderBy('due_date')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task)
    {
        // Check if the task belongs to the current user
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        $task = new Task([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'due_date' => $validated['due_date'],
            'user_id' => Auth::id()
        ]);
        
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    public function toggleComplete(Task $task)
    {
        // Check if the task belongs to the current user
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }
        
        $task->completed = !$task->completed;
        $task->save();
        
        return back()->with('success', 'Task status updated!');
    }
}