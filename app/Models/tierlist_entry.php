<?php

namespace App\Models;

use App\Models\hero;
use App\Models\tierlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;


class tierlist_entry extends Model
{
    use HasFactory;
    public $incrementing = false; // Deshabilitar el incremento automático
    protected $keyType = 'string'; // El tipo de la llave primaria será string

    protected $fillable = [
        'tierlist_id',
        'hero_id',
        'tier'
    ];

    // Heroes que aparecen en la tierlist
    public function heroe() {
        return $this->belongsTo(hero::class);
    }

    // Tierlist que aparece en la entrada
    public function tierlist() {
        return $this->belongsTo(tierlist::class);
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
