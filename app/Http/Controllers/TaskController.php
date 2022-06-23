<?php

namespace App\Http\Controllers;


use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::getAll();
        return view('tasks')->with([
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validations($request, null);
        Task::storeTask($request->all());
        return redirect()->back()->with('taskCreated', 'Task created sucessfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasks = Task::getAll();
        $task = Task::find($id);
        return view('editTask')->with([
            'task' => $task,
            'tasks' => $tasks
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validations($request, $id);
        $task = Task::findOrFail($id);
        $task->name = $request->name;
        $task->date = $request->date;
        $task->time = $request->time;
        $task->save();
        return redirect('tasks')->with('taskUpdated', 'Task Updated Sucessfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        return redirect()->back()->with('taskDelete', 'Task deleted sucessfully!');
    }

    public function validations(Request $request, $id) {
        $date = $request->date;
        $time = $request->time;
        $request->validate([
            'name' => ['required', 'max:30', 'min:10'],
            'date' => ['required', Rule::unique('tasks')->ignore($id)->where(function ($query) use ($date, $time) {
                return $query->where('date', $date)
                    ->where('time', $time);
            })],
            'time' => ['required']
        ]);
    }
}
