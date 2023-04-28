<?php

namespace App\Http\Controllers;

use App\Models\mitra;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class MitraAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $mitra = mitra::where('user_id', $user->id)->first();
        return view('mitra.akun.index', [
            'title' => $mitra->nama_usaha,
            'mitra' => $mitra,
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
     * @param  \App\Models\mitras  $mitras
     * @return \Illuminate\Http\Response
     */
    public function show(mitra $mitra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mitras  $mitras
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {   $mitra = mitra::where('id',$id)->first();
        
        return view('mitra.akun.edit', [
            'title' => $mitra->nama_usaha,
            'mitra' => $mitra,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mitras  $mitras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $mitra = mitra::where('id',$id)->first();
        
        

        $rules = [
            'name'         => 'required : max:255',
        ];

        if ($request->email != $mitra->user->email) {
            $rules['email'] = 'required|email|unique:users';
        }
        if($request->password){
            $rules['password'] = 'min:5';
        }
        $validatedData = $request->validate($rules);
        if($request->password){
            $validatedData['password'] = Hash::make($request->password);
        }

        User::Where('id', $mitra->user_id)
            ->update($validatedData);;

        $cek = ([
            'image' => 'image|file|max:5024',
            'no_hp' => 'min:11 | max:13 | required',
            'nama_usaha' => 'required | max:255',
            // 'province_id' => 'required',
            // 'regency_id' => 'required',
            // 'district_id' => 'required',
            // 'village_id' => 'required',
            'alamat' => 'min:2',
            'norek' =>'required | min:5'
        ]);
            if($request->file('image')){
                if($request->oldImage){
                    Storage::delete($request->oldImage);
                }
                
            }
        $validated = $request->validate($cek);
        if($request->file('image')){
            $validated['image'] = $request->file('image')->store('post-image');
        }
        if($request->regency_id){
            $validated['province_id'] = $request->province_id;
            $validated['regency_id'] = $request->regency_id;
            $validated['disctrict_id'] = $request->disctrict_id;
            $validated['village_id'] = $request->village_id;
        }
        // return $validated;
        mitra::where('id',$id)
        ->update($validated);;

        return redirect('/m/akun')->with('success', 'Berhasil mengubah akun!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mitras  $mitras
     * @return \Illuminate\Http\Response
     */
    public function destroy(mitra $mitra)
    {
        //
    }

    public function getKabupaten(Request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $kabupatens = Regency::where('province_id',$id_provinsi)->get();

        foreach($kabupatens as $kabupaten){
            echo "<option value='$kabupaten->id>$kabupaten->name</option>";
        }
    }
}
