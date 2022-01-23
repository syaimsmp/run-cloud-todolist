<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $tasks = Task::where('workspace_id', $request->workspace_id)->get();

        return view('task.index')->with('listing', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        // dd($request->workspace_id);
        $tasks = Task::where('workspace_id', $request->workspace_id)->first();
        return view('task.create')->with('workspace_id', $request->workspace_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string',
            'deadline' => 'required',
        ]);

        $workspace = Task::create([
            'title' => $request->title,
            'deadline' => $request->deadline,
            'workspace_id' => $request->workspace_id,
        ]);

        return redirect()->route('task.index', ['workspace_id'=> $request->workspace_id])->with('success', 'Maklumat telah berjaya disimpan');

    }

    public function updateTask(Task $task, Request $request){
        $task->update([
            'finished_on' => now(),
        ]);

        return redirect()->route('task.index', ['workspace_id'=> $request->workspace_id])->with('success', 'Maklumat telah berjaya disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task, $workspace_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, Task $task)
    {
        //
        $task->delete();
        return redirect()->route('task.index', ['workspace_id'=> $request->workspace_id])->with('success', 'Succesfully deleted');
    }
}
