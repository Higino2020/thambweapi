<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fita extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'volumes_id'];
    public function volume()
    {
        return $this->belongsTo('App\Models\Volume', 'volumes_id', 'id');
    }

    /**
     * Get all of the musicas for the Fita
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function musicas(): HasMany
    {
        return $this->hasMany(Musica::class);
    }
}
