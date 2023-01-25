<?php

namespace App\Http\Controllers;

use App\Models\Musica;
use Illuminate\Http\Request;
use Plank\Mediable\Media;
use Plank\Mediable\Facades\MediaUploader;
use Illuminate\Support\Facades\Log;

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

        Log::debug(request()->all());

        if (request()->hasFile('ficheiro')) {
            $media = MediaUploader::fromSource(request()->file('ficheiro'))
                ->toDirectory('musica')->onDuplicateIncrement()
                ->useHashForFilename()
                //->setAllowedAggregateTypes(['audio'])
                ->upload();
            Log::debug($media);

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
        $musica->fita_id = $request->fita_id;
        $musica->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function show($musica)
    {
        Musica::find($musica)->delete();
        return redirect()->back();
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
