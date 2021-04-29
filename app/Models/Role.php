<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Role
 * @package App\Models
 */
class Role extends Model
{
    use HasFactory;

    const ADMIN = 'ADMIN';

    /**
     * Get the own User
     */
    public function users(): HasMany
    {
        return $this->hasMany('App\Models\User');
    }

    public static function getAdmin()
    {
        return Role::whereRole(self::ADMIN);
    }

    protected $guarded = [];
}

