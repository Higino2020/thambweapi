<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Volume extends Model
{
    use HasFactory;
    protected $fillable = ['titulo'];

    /**
     * Get all of the fitas for the Volume
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fitas(): HasMany
    {
        return $this->hasMany(Fita::class, 'volumes_id');
    }
}
