<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Display the task list
    public function index()
    {
        // Get tasks ordered by priority (High, Medium, Low)
        $tasks = Task::orderBy('priority', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    // Store a new task
    public function store(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|string|in:Low,Medium,High',
            'status' => 'required|string|in:Not Started,In Progress,Completed',
            'other' => 'nullable|string', // 'other' is optional and will be used for additional information
        ]);

        // Create a new task with the provided data
        Task::create([
            'name' => $request->name,
            'priority' => $request->priority,
            'status' => $request->status,
            'other' => $request->other, // Save the 'other' field (can be used for additional notes or other info)
        ]);

        // Redirect to the task list
        return redirect()->route('tasks.index');
    }

    // Update the task status to 'Completed'
    public function complete($id)
    {
        // Find the task by ID
        $task = Task::findOrFail($id);

        // Set the task status to 'Completed'
        $task->status = 'Completed';
        $task->save();

        // Redirect to the task list
        return redirect()->route('tasks.index');
    }

    // Delete the task
    public function destroy($id)
    {
        // Find the task by ID
        $task = Task::findOrFail($id);

        // Delete the task
        $task->delete();

        // Redirect to the task list
        return redirect()->route('tasks.index');
    }
}
