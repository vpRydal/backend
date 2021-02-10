<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    const TYPE_PHONE="phone";
    const TYPE_EMAIL="email";

    /**
     * Get the own User
     */
    public function user(){
        return $this->belongsTo('App\Models\User');
    }


}
