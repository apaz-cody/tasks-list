<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            return view('index', [
                'tasks' => Task::latest()->paginate(10)
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(TaskRequest $request)
    {
        $task = Task::create($request->validated());
        return redirect()->route('tasks.show', ['task' => $task->id])
            ->with('success', 'Task created successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('show', [
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('edit', [
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Task $task, TaskRequest $request)
    {
        $task->update($request->validated());
        return redirect()->route('tasks.show', ['task' => $task->id])
            ->with('success', 'Task updated successfully!');
    }

    public function toogleComplete(Task $task){
        $task->toggleComplete();
        return redirect()->back()->with('success', 'Task updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully!');
    }
}
