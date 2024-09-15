<?php

namespace App\Models;

use App\Models\hero;
use App\Models\tierlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tierlist_entry extends Model
{
    use HasFactory;

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
}
