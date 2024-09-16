<?php

namespace App\Models;

use App\Models\tierlist;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tierlist_tier extends Model
{
    use HasFactory;
    public $incrementing = false; // Deshabilitar el incremento automático
    protected $keyType = 'string'; // El tipo de la llave primaria será string

    protected $fillable = [
        'tierlist_id',
        'posicion',
        'nombre',
        'color'
    ];

    // el tier row pertenece a la tierlist
    public function tierlist() {
        return $this->belongsTo(tierlist::class, 'tierlist_id');
    }

    public function entries() {
        return $this->hasMany(tierlist_entry::class);
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
