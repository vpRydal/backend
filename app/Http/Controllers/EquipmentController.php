<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Realty;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Equipment[]|Collection|Response
     */
    public function index(Request $request)
    {
        $equipments = Equipment::select('*');

        if ($request->has('realtyTypeId')) {
            $equipments->whereHas('realtyType', function($query) use ($request) {
                $query->where('realty_type_id', $request->realtyTypeId);
            });
        }

        return $equipments->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return Response
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return Response
     */
    public function destroy(Equipment $equipment)
    {
        //
    }
}
