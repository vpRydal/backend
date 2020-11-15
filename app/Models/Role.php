<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\Models
 */
class Role extends Model
{
    use HasFactory;

    /**
     * Get the own User
     */
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}

