<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tierlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    // Entradas de la tierlist
    public function entradas() {
        return $this->hasMany(tierlist_entry::class);
    }
}
