<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskManagementController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
      $validatedData= $request->validate([
            'title' => 'required|string|max:255',
            'description'=>'required|string|max:255',
            'status' => 'required|in:pending,in progress,completed',
            'due_date' => 'nullable|date',
        ]);

        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }


    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }
    public function update(Request $request, Task $task)
{
    $validatedData = $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'status'      => 'required|in:pending,progress,completed',
        'due_date'    => 'nullable|date',
    ]);


    $task->update($validatedData);


    return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
}


    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}

