<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;
    protected $fillable = ['titulo','autor','file','capa','ano','fita_id'];
    public function fita(){
        return $this->belongsTo('App\Models\Fita','fita_id');
    }
}
