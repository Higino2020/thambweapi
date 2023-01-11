<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Musica;
use App\Models\Imagem;
use App\Models\Video;
use App\Models\Artista;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('musicas',function(){
    $musicas = Musica::all();
    return compact('musicas');
});
Route::get('musicas/{nome}',function($nome){
    $musicas = Musica::where('titulo','like','%'.$nome.'%')->get();
    return compact('musicas');
});
Route::get('musicas/destaque',function(){
    $musicas = Musica::orderBy('id','DESC')->limit(6)->get();
    return compact('musicas');
});
Route::get('artistas',function(){
    $artista = Artista::all();
    return compact('artista');
});
Route::get('videos',function(){
    $videos = Video::all();
    return compact('videos');
});
Route::get('galeria',function(){
    $img = Imagem::all();
    return compact('img');
});