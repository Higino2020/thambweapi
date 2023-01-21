<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fita extends Model
{
    use HasFactory;
    protected $fillable=['nome','volumes_id'];
    public function volume(){
        return $this->belongsTo('App\Models\Volume','volumes_id','id');
    }
}
