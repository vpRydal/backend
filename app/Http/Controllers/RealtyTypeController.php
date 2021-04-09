<?php

namespace App\Http\Controllers;

use App\Models\RealtyType;
use Illuminate\Http\Request;

class RealtyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return RealtyType[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return RealtyType::all();
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RealtyType  $realtyType
     * @return RealtyType
     */
    public function show(RealtyType $realtyType)
    {
        return $realtyType;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RealtyType  $realtyType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RealtyType $realtyType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RealtyType  $realtyType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealtyType $realtyType)
    {
        //
    }
}
