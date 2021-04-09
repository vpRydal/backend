<?php

namespace App\Http\Controllers;

use App\Http\Resources\RealtyCollection;
use App\Models\Realty;
use Illuminate\Http\Request;

class RealtyController extends Controller
{
    /**
     * @param Request $request
     *
     * @return RealtyCollection
     */
    public function realties(Request $request)
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
     * @param Request $request
     *
     * @return array
     */
    public function counteRealties(Request $request)
    {
        $realty = $this->filter($request);
        return ['amount' => $realty->count()];
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function mapRealties(Request $request)
    {
        $realty = $this->filter($request);
        return $realty->get();
    }

    public function gitMinMax(Request $request)
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
     * @return mixed
     */
    public function filter(Request $request)
    {
        $realty = Realty::whereNotNull('description');
        if ($request->has('types')) {
            $realty->whereIn('type_id', $request->get('types'));
        }
        if ($request->has('exceptedId')) {
            $realty->whereNotIn('id', $request->get('exceptedId'));
        }
        if ($request->has('renovation')) {
            $realty->where(['renovation' => 1]);
        }
        if ($request->has('heating')) {
            $realty->where(['heating' => 1]);
        }
        if ($request->has('restroom')) {
            $realty->where(['restroom' => 1]);
        }
        if ($request->has('access')) {
            $realty->where(['access' => 1]);
        }
        if ($request->has('furniture')) {
            $realty->where(['furniture' => 1]);
        }
        if ($request->has('energy')) {
            $realty->where(['energy' => $request->get('energy')]);
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


    public function change($id,Request $request){
        try {
            $realty = Realty::findOrFail($id);
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
}
