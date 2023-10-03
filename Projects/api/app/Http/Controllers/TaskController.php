<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return response()->json(Task::all(), 200);
        }catch(\Exception $e){
            return response()->json([
                "message" => "Error: " . $e->getMessage(),
            ], 500);
        }
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
        $task = Task :: create($request->all());

        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        try{
            return response()->json($task, 200);
        }catch(\Exception $e){
            return response()->json([
                "message" => "Error: " . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
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
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        try{
            $task->update($request->all());
            return response()->json($task, 200);
        }catch(\Exception $e){
            return response()->json([
                "message" => "Error: " . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        try{
            $task->delete();
            return response()->json(null, 204);
        }catch(\Exception $e){
            return response()->json([
                "message" => "Error: " . $e->getMessage(),
            ], 500);
        }
    }


    public function search(Request $request)
    {
        try{
            return response()->json(Task::orderBy('updated_at', 'desc')->where('task', 'LIKE', '%' . $request->search . '%' )->get(), 200);
        }catch(\Exception $e){
            return response()->json([
                "message" => "Error: " . $e->getMessage(),
            ], 500);
        }
    }

}
