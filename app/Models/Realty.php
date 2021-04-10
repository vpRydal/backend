<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Realty extends Model
{
    use HasFactory;
    protected $table='realties';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function realtyType(){
        return $this->belongsTo(RealtyType::class, 'type_id', 'id');
    }

    protected $casts = [
        'photo' => 'array',
    ];

    public function equipments(): BelongsToMany
    {
        return $this->belongsToMany(Equipment::class, RealtyEquipment::class);
    }
}
