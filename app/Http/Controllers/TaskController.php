<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() 
    {
        $draftTasks = Task::latest()->where('status_id', 1)->paginate(5);
        $publishedTasks = Task::latest()->where('status_id', 2)->paginate(5);
        $validateTasks = Task::latest()->where('status_id', 3)->paginate(5);
        $doneTasks = Task::orderBy('deleted_at', 'desc')->where('status_id', 3)->paginate(5);

        return view('pages.tasks.index', compact(
            'draftTasks', 
            'publishedTasks',
            'validateTasks',
            'doneTasks'
        ));
    }

    public function create()
    {
        $users = User::all();
        $statuses = Status::all();

        return view('pages.tasks.create', compact('users', 'statuses'));
    }

    public function store(Request $request)
    {
        $taskData = $request->all();
        $taskData['published_at'] = now();

        Task::create($taskData);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show()
    {

    }

    public function edit(Task $task)
    {
        $users = User::all();
        $statuses = Status::all();

        return view('pages.tasks.edit', compact('task', 'users', 'statuses'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
