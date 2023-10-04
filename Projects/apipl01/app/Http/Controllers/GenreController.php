<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return response()->json(Genre::all(), 200);

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
            $genre = new Genre();
            $genre->description = $request->description;
            $genre->save();
            $genre->movies()->attach($request->movies);
            return response()->json($genre, 201);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        try{
            return response()->json($genre, 200);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        try{
            $genre->description = $request->description;
            $genre->save();
            $genre->movies()->sync($request->movies);
            return response()->json($genre, 201);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        try{
            $genre->delete();
        }
        catch(\Exception $e){
            return response()->json(['message' => $e], 500);
        }
    }


    public function search(Request $request){
        try{
            return response()->json(Genre::where('description', 'like', '%' . $request->description . '%')->get(), 200);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e], 500);
        }
    }
}
