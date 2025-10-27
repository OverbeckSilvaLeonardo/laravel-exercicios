<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use SoftDeletes;

    protected $table = 'eventos';
    protected $primaryKey = 'id';
//    public $timestamps = false;

    public function ingressos(): HasMany
    {
        return $this->hasMany(Ingresso::class);
    }
}
