<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class tierlist extends Model
{
    use HasFactory;
    public $incrementing = false; // Deshabilitar el incremento automático
    protected $keyType = 'string'; // El tipo de la llave primaria será string

    protected $fillable = [
        'nombre',
        'descripcion',
        'num_tiers'
    ];

    // Entradas de la tierlist
    public function tiers() {
        return $this->hasMany(tierlist_tier::class);
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
