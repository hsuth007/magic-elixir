<?php

namespace App\Http\Controllers;

use App\Magic;
//use App\Models\Magic;
use App\Http\Resources\Magic as MagicResource;
use Illuminate\Http\Request;

class MagicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magic = Magic::all();
        return response()->json($magic);
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
        $request->validate([
            'first_name'    => 'required|max:64',
            'last_name'     => 'required|max:64',
            'email'         => 'required|max:256',
            'street1'       => 'required',
            'city'          => 'required',
            'state'         => 'required',
            'zip'           => 'required',
            'phone'         => 'required',
            'quantity'      => 'required',
            'cc_num'        => 'required',
            'exp'           => 'required'
        ]);
        $magic = \App\Magic::create($request->all());
        return response()->json(['message' => 'id', 'magic' => $magic]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Magic  $magic
     * @return \Illuminate\Http\Response
     */
    public function show(Magic $magic)
    {
        return $magic;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Magic  $magic
     * @return \Illuminate\Http\Response
     */
    public function edit(Magic $magic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Magic  $magic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Magic $magic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Magic  $magic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magic $magic)
    {
        //
    }
}
