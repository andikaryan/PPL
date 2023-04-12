<?php

namespace App\Http\Controllers;

use App\Models\mitra;
use App\Models\User;
use App\Http\Requests\StoremitraRequest;
use App\Http\Requests\UpdatemitraRequest;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('mitra.dashboard',[
            "title" => "Mitra Dasboard",
            "nama" => mitra::where('user_id', auth()->user()->id)->first(),
            'head' => User::find(auth()->user()->id),
        ]);
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
     * @param  \App\Http\Requests\StoremitraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremitraRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function show(mitra $mitra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function edit(mitra $mitra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemitraRequest  $request
     * @param  \App\Models\mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemitraRequest $request, mitra $mitra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function destroy(mitra $mitra)
    {
        //
    }
}
