<?php

namespace App\Http\Controllers;

use App\Models\investor;
use App\Http\Requests\StoreinvestorRequest;
use App\Http\Requests\UpdateinvestorRequest;

class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        
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
     * @param  \App\Http\Requests\StoreinvestorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreinvestorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function show(investor $investor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function edit(investor $investor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateinvestorRequest  $request
     * @param  \App\Models\investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateinvestorRequest $request, investor $investor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function destroy(investor $investor)
    {
        //
    }
}
