<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RealtyEquipment extends Pivot
{
    public function realty(): BelongsTo
    {
        return $this->belongsTo(Realty::class);
    }
}
