<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class hero extends Model
{
    use HasFactory;
    public $incrementing = false; // Deshabilitar el incremento automático
    protected $keyType = 'string'; // El tipo de la llave primaria será string

    protected $fillable = [
        'nombre',
        'nota',
        'rol',
        'img_path'
    ];

    /**
     * es counter
     */
    public function counters(): BelongsToMany
    {
        return $this->belongsToMany(Hero::class, 'hero_counter', 'hero_id', 'counter_id');
    }

    /**
     * sus counters
     */

    public function counteredBy(): BelongsToMany
    {
        return $this->belongsToMany(Hero::class, 'hero_counter', 'counter_id', 'hero_id');
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
