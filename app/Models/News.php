<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'header',
        'content',
    ];

    /**
     * @param $value
     *
     * @return false|string
     */
    public function getPhoto($value){
        $pics=json_decode($value);
        foreach ($pics as $key=>$pick){
            $pics[$key]=base_path().$pick;
        }
        return json_encode($pics);
    }
    /**
     * Get the own User
     */
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public $timestamps = false;

}
