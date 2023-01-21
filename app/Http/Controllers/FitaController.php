<?php

namespace App\Http\Controllers;

use App\Models\Fita;
use Illuminate\Http\Request;

class FitaController extends Controller
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
        Fita::create($request->except('_token'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fita  $fita
     * @return \Illuminate\Http\Response
     */
    public function show(Fita $fita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fita  $fita
     * @return \Illuminate\Http\Response
     */
    public function edit(Fita $fita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fita  $fita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fita $fita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fita  $fita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fita $fita)
    {
        //
    }
}
