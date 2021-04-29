<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Equipment extends Model
{
    use HasFactory;

    public function realty(): BelongsToMany
    {
        return $this->belongsToMany(Realty::class, RealtyEquipment::class);
    }

    protected $guarded = [];

    public function realtyType(): BelongsTo
    {
        return $this->belongsTo(RealtyType::class);
    }
}
