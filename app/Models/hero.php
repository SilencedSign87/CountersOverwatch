<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class hero extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
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
}
