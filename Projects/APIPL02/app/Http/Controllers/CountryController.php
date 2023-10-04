<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return response()->json(Country::all(), 200);
        }
        catch(\Exception $e){
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country = Country::create($request->all());

        return response()->json($country, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        try{
            return response()->json($country, 200);
        }
        catch(\Exception $e){
            return response()->json(['error' => $e], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        try{
            $country->update($request->all());
            return response()->json($country, 200);
        }
        catch(\Exception $e){
            return response()->json(['error' => $e], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        try{
            $country->delete();
            return response()->json(['message' => 'deleted'], 204);
        }
        catch(\Exception $e){
            return response()->json(['error' => $e], 500);
        }
    }


    public function search(Request $request)
    {
        try{
            return response()->json(Country::orderBy("updated_at", "desc")->where('name', 'LIKE', '%' . $request->name . '%')->get(), 200);
        }
        catch(\Exception $e){
            return response()->json(['error' => $e], 500);
        }
    }
}
