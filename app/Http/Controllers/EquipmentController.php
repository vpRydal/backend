<?php

namespace App\Http\Controllers;

use App\Http\Resources\EquipmentResource;
use App\Models\Equipment;
use Illuminate\Http\Request;


class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $equipments = Equipment::select('*');

        if ($request->has('realtyTypeId')) {
            $equipments->whereHas('realtyType', function($query) use ($request) {
                $query->where('realty_type_id', $request->realtyTypeId);
            });
        }

        return EquipmentResource::collection($equipments->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return EquipmentResource
     */
    public function store(Request $request)
    {
        $equip = Equipment::make($request->only(['name', 'display_name', 'realty_type_id']));
        $equip->save();

        return EquipmentResource::make($equip);
    }

    /**
     * Display the specified resource.
     *
     * @param Equipment $equipment
     * @return EquipmentResource
     */
    public function show(Equipment $equipment)
    {
        return EquipmentResource::make($equipment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Equipment $equipment
     * @return EquipmentResource
     */
    public function update(Request $request, Equipment $equipment)
    {
        $equip = $equipment->fill($request->only(['name', 'display_name', 'realty_type_id']));
        $equip->update();

        return EquipmentResource::make($equipment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Equipment $equipment
     * @return bool
     * @throws \Exception
     */
    public function destroy(Equipment $equipment)
    {
        return $equipment->delete();
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function destroyMultiple(Request $request)
    {
        return Equipment::whereIn('id', $request->id)->delete();
    }
}
