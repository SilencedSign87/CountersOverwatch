<?php

namespace App\Models;

use App\Models\hero;
use App\Models\tierlist_tier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;


class tierlist_entry extends Model
{
    use HasFactory;
    public $incrementing = false; // Deshabilitar el incremento automático
    protected $keyType = 'string'; // El tipo de la llave primaria será string

    protected $fillable = [
        'tierlist_tier_id',
        'hero_id',
        'posicion'
    ];

    // obtener el heroes que aparecen en la tierlist
    public function hero() {
        return $this->belongsTo(hero::class,'hero_id');
    }

    // obtener la tierlist_row a la que pertenece
    public function row() {
        return $this->belongsTo(tierlist_tier::class, 'tierlist_tier_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid(); // Generar UUID
            }
        });
    }
}
