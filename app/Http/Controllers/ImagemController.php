<?php

namespace App\Http\Controllers;

use App\Models\Imagem;
use Illuminate\Http\Request;
use Plank\Mediable\Media;
use Plank\Mediable\Facades\MediaUploader;

class ImagemController extends Controller
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
        $imagem = new Imagem();
          
            if (request()->hasFile('file')) {
                $media = MediaUploader::fromSource(request()->file('file'))
                    ->toDirectory('imagem')->onDuplicateIncrement()
                    ->useHashForFilename()
                    ->setAllowedAggregateTypes(['image'])->upload();
                $imagem->file = $media->basename;
            }
            $imagem->titulo = $request->titulo;
            $imagem->ano = $request->ano;
            $imagem->save();
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imagem  $imagem
     * @return \Illuminate\Http\Response
     */
    public function show(Imagem $imagem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imagem  $imagem
     * @return \Illuminate\Http\Response
     */
    public function edit(Imagem $imagem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imagem  $imagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagem $imagem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imagem  $imagem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imagem $imagem)
    {
        //
    }
}
