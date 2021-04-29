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
        $realtyType = RealtyType::make($request->only(['name']));
        $realtyType->img_path = '/storage/' . $request->file('img_path')->store('images/realtyType', 'public');

        $realtyType->save();

        return $realtyType;
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
     * @return RealtyType
     */
    public function update(Request $request, RealtyType $realtyType)
    {
        $realtyType->fill($request->only(['name']));

        // TODO: добавить удалдение фотоки
        if ($request->hasFile('img_path')) {
            $realtyType->img_path = '/storage/' . $request->file('img_path')->store('images/realtyType', 'public');
        }

        $realtyType->update();

        return $realtyType;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RealtyType  $realtyType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealtyType $realtyType)
    {
        // TODO: добавить удалдение фотоки
        return $realtyType->delete();
    }

    public function destroyMultiple(Request $request)
    {
        // TODO: добавить удалдение фотоки
        return RealtyType::whereIn('id', $request->id)->delete();
    }
}
