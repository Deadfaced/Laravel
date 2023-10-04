<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return response()->json(Movie::all(), 200);

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
            $movie = new Movie();
            $movie->title = $request->title;
            $movie->year = $request->year;
            $movie->released = $request->released;
            $movie->runtime = $request->runtime;
            $movie->director = $request->director;
            $movie->imdb_votes = $request->imdb_votes;
            $movie->save();
            $movie->actors()->attach($request->actors);
            $movie->genres()->attach($request->genres);
            return response()->json($movie, 201);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        try{
            return response()->json($movie->load('actors'), 200);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        try{
            $movie->title = $request->title;
            $movie->year = $request->year;
            $movie->released = $request->released;
            $movie->runtime = $request->runtime;
            $movie->director = $request->director;
            $movie->imdb_votes = $request->imdb_votes;
            $movie->save();
            $movie->actors()->sync($request->actors);
            $movie->genres()->sync($request->genres);
            return response()->json($movie, 201);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        try{
            $movie->delete();
        }
        catch(\Exception $e){
            return response()->json(['message' => $e], 500);
        }
    }


    public function search(Request $request){
        try{
            return response()->json(Movie::where('title', 'like', '%' . $request->title . '%')->get(), 200);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e], 500);
        }
    }
}
