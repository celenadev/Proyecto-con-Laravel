<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('User')->latest()->simplePaginate(5);
        return view('tasks.index', [
            'tasks' => $tasks
        ]);

    }

    public function create()
    {
        $users = User::all();
        return view('tasks.create', ['users' => $users]);

    }


    public function show($id)
    {
        $task = Task::with(['User', 'Tags'])->find($id);
        return view('tasks.show', ['task' => $task]);
    }

    public function store()
    {
        request()->validate([
            'description' => ['required'],
            'estado' => ['required'],
            'user_id' => ['required'],
        ]);
        Task::create([
            'description' => request('description'),
            'estado' => request('estado'),
            'user_id' => request('user_id')
        ]);
        return redirect('/tasks');

    }

    public function edit($id)
    {
        $task = Task::find($id);
        $users = User::all();
        return view('tasks.edit', ['task' => $task, 'users' => $users]); // pasa las variables $task y $users a la vista
    }

    public function update($id)
    {
        request()->validate([
            'description' => ['required'],
            'estado' => ['required'],
            'user_id' => ['required'],
        ]);
        //authorize
        $task = Task::findOrFail($id);
        $task->update([
            'description' => request('description'),
            'estado' => request('estado'),
            'user_id' => request('user_id'),

        ]);
        return redirect('/tasks/' . $task->id);
    }

    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        return redirect('/tasks');

    }
}
