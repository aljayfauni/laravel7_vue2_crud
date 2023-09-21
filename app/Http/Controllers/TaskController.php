<?php

// app/Http/Controllers/TaskController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // Import the Task model

class TaskController extends Controller
{
    public function index()
    {
        // Retrieve and return all tasks from the database
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        // Validate and store a new task in the database
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $task = Task::firstOrcreate($validatedData);

        return response()->json($task, 201);
    }

    public function show($id)
    {
        // Retrieve and return a specific task by ID
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        // Validate and update a specific task by ID
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $task = Task::findOrFail($id);
        $task->update($validatedData);

        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }


    public function search(Request $request)
    {
        $searchQuery = $request->input('search');

        $tasks = Task::where('title', 'like', "%$searchQuery%")
            ->orWhere('description', 'like', "%$searchQuery%")
            ->get();

        return response()->json($tasks);
    }

}
