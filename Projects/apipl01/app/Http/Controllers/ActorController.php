<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Movie;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return response()->json(Actor::all(), 200);

        }
        catch(\Exception $e){
            return response()->json(['message' => $e], 500);
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
        try{
            $actor = new Actor();
            $actor->name = $request->name;
            $actor->save();
            $actor->actors()->attach($request->actors);
            return response()->json($actor, 201);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actor)
    {
        try{
            return response()->json($actor, 200);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit(Actor $actor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actor $actor)
    {
        try{
            $actor->name = $request->name;
            $actor->save();
            $actor->actors()->attach($request->actors);
            return response()->json($actor, 201);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor)
    {
        try{
            $actor->delete();
        }
        catch(\Exception $e){
            return response()->json(['message' => $e], 500);
        }
    }


    public function search(Request $request){
        try{
            return response()->json(Actor::where('name', 'like', '%' . $request->name . '%')->get(), 200);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e], 500);
        }
    }
}
