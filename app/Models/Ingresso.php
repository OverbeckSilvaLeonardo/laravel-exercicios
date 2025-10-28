<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ingresso extends Model
{
    protected $table = 'ingressos';


    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class);
    }
}
