<?php

namespace App\Http\Controllers;

use App\Models\Short;
use App\Http\Requests\StoreShortRequest;
use App\Http\Requests\UpdateShortRequest;

class ShortController extends Controller
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
     * @param  \App\Http\Requests\StoreShortRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShortRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Short  $short
     * @return \Illuminate\Http\Response
     */
    public function show(Short $short)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Short  $short
     * @return \Illuminate\Http\Response
     */
    public function edit(Short $short)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShortRequest  $request
     * @param  \App\Models\Short  $short
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShortRequest $request, Short $short)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Short  $short
     * @return \Illuminate\Http\Response
     */
    public function destroy(Short $short)
    {
        //
    }
}
