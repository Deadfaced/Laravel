<?php

namespace App\Http\Controllers;

use App\Bicycle;
use Illuminate\Http\Request;

class BicycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return response()->json(Bicycle::all(), 200);
        }catch(\Exception $e){
            return response()->json(['error' => $e], 500);
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
        $bicycle = Bicycle::create($request -> all());

        return response()->json($bicycle, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\Response
     */
    public function show(Bicycle $bicycle)
    {
        try{
            return response()->json($bicycle, 200);
        }
        catch(\Exception $e){
            return response()->json(['error' => $e], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\Response
     */
    public function edit(Bicycle $bicycle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bicycle $bicycle)
    {
        try{
            $bicycle->update($request->all());
            return response()->json($bicycle, 200);
        }
        catch(\Exception $e){
            return response()->json(['error' => $e], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bicycle $bicycle)
    {
        try{
            $bicycle->delete();
            return response()->json(["message" => "Deleted"], 205);
        }
        catch(\Exception $e){
            return response()->json(['error' => $e], 500);
        }
    }


    public function search(Request $request){
        try{
            return response()->json(Bicycle::orderBy("brand", "ASC")->where("brand", "LIKE", "%" . $request->brand . "%")->get(), 200);
        }
        catch(\Exception $e){
            return response()->json(['error' => $e], 500);
        }
    }
}
