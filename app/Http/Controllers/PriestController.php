<?php

namespace App\Http\Controllers;

use App\Priest;
use Illuminate\Http\Request;

class PriestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all data for Priest table
        return Priest::all();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Priest  $priest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return specific row using id
        return Article::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Priest  $priest
     * @return \Illuminate\Http\Response
     */
    public function edit(Priest $priest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Priest  $priest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Priest $priest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Priest  $priest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Priest $priest)
    {
        //
    }
}
