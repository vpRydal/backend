<?php

namespace App\Http\Controllers;

use App\Http\Resources\RealtyCollection;
use App\Http\Resources\RealtyResource;
use App\Models\Realty;
use Illuminate\Http\Request;

class RealtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return RealtyCollection
     */
    public function index(Request $request)
    {
        $realty = $this->filter($request);
        $request->has('perPage') ? $perPage = $request->get('perPage') : $perPage = 10;

        if ($request->has('sortBy')) {
            $realty->orderBy($request->sortBy, $request->sortType ?? 'desc');
        }

        if ($request->has('searchField') and $request->has('searchValue')) {
            $realty->where($request->searchField, 'like', "%$request->searchValue%");
        }

        return new RealtyCollection($realty->paginate($perPage));
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
     * @param  \App\Models\Realty  $realty
     * @return RealtyResource
     */
    public function show(Realty $realty)
    {
        return RealtyResource::make($realty);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Realty  $realty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Realty $realty)
    {
        try {
            if ($request->hasFile('img_path')) {
                $path = $request->file('img_path')->store('public/image');
                $path=explode('/',$path);
                $path[0]='storage';
                $path=implode("/", $path);
                $realty->img_path=$path;
            }
            $this->setValue($request,$realty,'photo');
            if ($request->hasFile('newPhoto')) {
                $files=[];
                //throw new \Exception($request->file('newPhoto'));
                foreach ($request->allFiles() as $file){
                    $path=$file->store('public/image');
                    $path=explode('/',$path);
                    $path[0]='/storage';
                    $path=implode("/", $path);
                    $files[]=$path;
                }
                $realty->photo=array_merge($files,$realty->photo);
            }

            $this->setValue($request,$realty,'description');
            $this->setValue($request,$realty,'name');
            $this->setValue($request,$realty,'renovation');
            $this->setValue($request,$realty,'heating');
            $this->setValue($request,$realty,'area');
            $this->setValue($request,$realty,'price');
            $this->setValue($request,$realty,'price_per_metr');
            $this->setValue($request,$realty,'restroom');
            $this->setValue($request,$realty,'access');
            $this->setValue($request,$realty,'furniture');
            $this->setValue($request,$realty,'energy');
            $this->setValue($request,$realty,'latitude');
            $this->setValue($request,$realty,'longitude');
            $realty->name=$request->post('name');
            if(!$realty->save()){
                throw new \Exception('Cannot save property');
            }
            return $realty;
        }catch (\Exception $e){
            return ['error'=>$e->getMessage()];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Realty  $realty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Realty $realty)
    {
        //
    }

    public function minMax(Request $request): array
    {
        $realty = $this->filter($request);
        return [
            'pricePerMetrMin' => $realty->min('price_per_metr'),
            'pricePerMetrMax' => $realty->max('price_per_metr'),
            'priceMin' => $realty->min('price'),
            'priceMax' => $realty->max('price'),
            'areaMin' => $realty->min('area'),
            'areaMax' => $realty->max('area')
        ];
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function count(Request $request)
    {
        $realty = $this->filter($request);
        return ['amount' => $realty->count()];
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function mapRealty(Request $request)
    {
        $realty = $this->filter($request);
        return $realty->get();
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function filter(Request $request)
    {
        $realty = Realty::whereNotNull('description');

        if ($request->has('equipments')) {
            $realty->whereHas('equipments', function($query) use ($request) {
                $query->whereIn('equipment.id', $request->equipments);
            });
        }
        if ($request->has('types')) {
            $realty->whereIn('type_id', $request->get('types'));
        }
        if ($request->has('exceptedId')) {
            $realty->whereNotIn('id', $request->get('exceptedId'));
        }
        if ($request->has('areaMin')) {
            $realty->where('area', '>=', $request->get('areaMin'));
        }
        if ($request->has('areaMax')) {
            $realty->where('area', '<=', $request->get('areaMax'));
        }
        if ($request->has('latitudeMin')) {
            $realty->where('latitude', '>=', $request->get('latitudeMin'));
        }
        if ($request->has('latitudeMax')) {
            $realty->where('latitude', '<=', $request->get('latitudeMax'));
        }
        if ($request->has('longitudeMin')) {
            $realty->where('longitude', '<=', $request->get('longitudeMin'));
        }
        if ($request->has('longitudeMax')) {
            $realty->where('longitude',  '>=', $request->get('longitudeMax'));
        }
        if ($request->has('priceMin')) {
            $realty->where('price', '>=', $request->get('priceMin'));
        }
        if ($request->has('priceMax')) {
            $realty->where('price', '<=', $request->get('priceMax'));
        }
        if ($request->has('pricePerMetrMin')) {
            $realty->where('price_per_metr', '>=', $request->get('pricePerMetrMin'));
        }
        if ($request->has('pricePerMetrMax')) {
            $realty->where('price_per_metr', '<=', $request->get('pricePerMetrMax'));
        }
        return $realty;
    }
    private function setValue(Request $request,Realty $realty, $property){
        $realty->$property = $request->post($property, $realty->$property);
    }
}
