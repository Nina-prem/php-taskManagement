<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // GET /tasks
    public function index()
    {
        return response()->json(Task::all(), 200);
    }

    // POST /tasks
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status'      => 'required|in:pending,progress,completed',
            'due_date'    => 'nullable|date',
        ]);

        $task = Task::create($request->only('title', 'description', 'status', 'due_date'));

        return response()->json($task, 201);
    }

    // GET /tasks/{id}
    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json($task, 200);
    }
public function update(Request $request, $id)
{
    $task = Task::findOrFail($id);

    $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'status'      => 'required|in:pending,progress,completed',
        'due_date'    => 'nullable|date',
    ]);

    $task->update($request->only('title', 'description', 'status', 'due_date'));

    return response()->json($task, 200);
}

public function destroy(Task $task)
{
    $task->delete();

    return response()->json(['message' => 'post deleted'], 200);
}
}