<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Plank\Mediable\Media;
use Plank\Mediable\Facades\MediaUploader;

class VideoController extends Controller
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
        $video = new Video();
          
        if (request()->hasFile('capa')) {
            $media = MediaUploader::fromSource(request()->file('capa'))
                ->toDirectory('video')->onDuplicateIncrement()
                ->useHashForFilename()
                ->setAllowedAggregateTypes(['image'])->upload();
            $video->capa = $media->basename;
        }
        $video->titulo = $request->titulo;
        $video->link = $request->link;
        $video->autor = $request->autor;
        $video->ano = $request->ano;
        $video->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
