<?php

namespace App\Http\Controllers;

use App\Models\Musica;
use Illuminate\Http\Request;
use Plank\Mediable\Media;
use Plank\Mediable\Facades\MediaUploader;

class MusicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $musica = new Musica();
          
            if (request()->hasFile('file')) {
                $media = MediaUploader::fromSource(request()->file('file'))
                    ->toDirectory('musica')->onDuplicateIncrement()
                    ->useHashForFilename()
                    ->setAllowedAggregateTypes(['image'])->upload();
                $musica->file = $media->basename;
            }
            if (request()->hasFile('capa')) {
                $media = MediaUploader::fromSource(request()->file('capa'))
                    ->toDirectory('musica')->onDuplicateIncrement()
                    ->useHashForFilename()
                    ->setAllowedAggregateTypes(['image'])->upload();
                $musica->capa = $media->basename;
            }
            $musica->titulo = $request->titulo;
            $musica->autor = $request->autor;
            $musica->ano = $request->ano;
            $musica->save();
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function show(Musica $musica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function edit(Musica $musica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Musica $musica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Musica $musica)
    {
        //
    }
}
