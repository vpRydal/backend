<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    protected $hidden = ['user_id'];

    /**
     * Get the own User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
