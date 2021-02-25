<?php

namespace App\Http\Controllers;

use App\Http\Resources\Realty as RealtyCollection;
use App\Models\Realty;
use Illuminate\Http\Request;

class RealtyController extends Controller
{
    /**
     * @param Request $request
     *
     * @return RealtyCollection
     */
    public function realties(Request $request){
        $request->has('count')?$count=$request->get('count'):$count=10;
        $realty=$this->filter($request);
        return new RealtyCollection($realty->paginate($count));
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function counteRealties(Request $request){
        $realty=$this->filter($request);
        return ['amount'=>$realty->count()];
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function mapRealties(Request $request){
        $realty=$this->filter($request);
        return $realty->get();
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function filter(Request $request){
        $realty=Realty::whereNotNull('description');
        if($request->has('types')){
            $realty->whereIn('type_id', $request->get('types'));
        }
        if($request->has('exceptedId')){
            $realty->whereNotIn('id', $request->get('exceptedId'));
        }
        if($request->has('renovation')){
            $realty->where(['renovation'=> 1]);
        }
        if($request->has('heating')){
            $realty->where(['heating'=> 1]);
        }
        if($request->has('restroom')){
            $realty->where(['restroom'=> 1]);
        }
        if($request->has('access')){
            $realty->where(['access'=> 1]);
        }
        if($request->has('furniture')){
            $realty->where(['furniture'=> 1]);
        }
        if($request->has('energy')){
            $realty->where(['energy'=>$request->get('energy')]);
        }
        if($request->has('areaMin')){
            $realty->where('area','>=',$request->get('areaMin'));
        }
        if($request->has('areaMax')){
            $realty->where('area','<=',$request->get('areaMax'));
        }
        if($request->has('latitudeMin')){
            $realty->where('latitude','>=',$request->get('latitudeMin'));
        }
        if($request->has('latitudeMax')){
            $realty->where('latitude','<=',$request->get('latitudeMax'));
        }
        if($request->has('longitudeMin')){
            $realty->where('longitude','>=',$request->get('longitudeMin'));
        }
        if($request->has('longitudeMax')){
            $realty->where('longitude','<=',$request->get('longitudeMax'));
        }
        if($request->has('priceMin')){
            $realty->where('price','=>',$request->get('priceMin'));
        }
        if($request->has('priceMax')){
            $realty->where('price','<=',$request->get('priceMax'));
        }
        return $realty;
    }
}
