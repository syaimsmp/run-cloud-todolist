<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
	// new task controller comment

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

        //check if file belongs to user
        $user = Auth::user();
        $owner_id = data_get($tasks->first(), 'user_id', $user->id);

        if($owner_id != $user->id){
            return redirect()->route('workspace.index')->with('error_auth', 'Hanya pemilik dibenarkan melihat paparan tersebut');
        }

        // dd($tasks->pluck('time_remaining'));

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

    public function tester( )
    {
        //
        $path = storage_path() . "/result_query.json";
        $string = json_decode(file_get_contents($path));
        $string = collect($string)->chunk(3);
        $string = collect($string)->transform(function ($str){
             return $str->groupBy('SupplierCode');
        });
        return view('test.test2');
       dd($string);
    }
}
