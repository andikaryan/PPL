<?php

namespace App\Http\Controllers;

use App\Models\mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class MitraKtpController extends Controller
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
    public function edit($id)
    {
        $mitra = mitra::where('id',$id)->first();
        
        return view('mitra.akun.editktp', [
            'title' => $mitra->nama_usaha,
            'mitra' => $mitra,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mitra  $mitra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
            $cek =([
                'fotoKTP' => 'image|file|max:5024'
            ]);
            if($request->file('fotoKTP')){
                if($request->oldImage){
                    Storage::delete($request->oldImage);
                }
            }
            $validated = $request->validate($cek);
            $validated['fotoKTP'] = $request->file('fotoKTP')->store('post-image');
            // return $validated;
            mitra::where('id',$id)
            ->update($validated);;

        
        return redirect('/m/akun')->with('success', 'Berhasil mengubah foto KTP!');
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
