<?php

namespace App\Http\Controllers;

use App\Models\investor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class InvestorAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $investor = investor::where('user_id', $user->id)->first();
        return view('investor.akun.index', [
            'title' => $investor->user->name,
            'investor' => $investor,
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
    public function edit($id)
    {
        $investor = investor::where('id',$id)->first();
        
        return view('investor.akun.edit', [
            'title' => $investor->user->name,
            'investor' => $investor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $investor = investor::where('id',$id)->first();
        
        

        $rules = [
            'name'         => 'required : max:255',
        ];

        if ($request->email != $investor->user->email) {
            $rules['email'] = 'required|email|unique:users';
        }
        if($request->password){
            $rules['password'] = 'min:5';
        }
        $validatedData = $request->validate($rules);
        if($request->password){
            $validatedData['password'] = Hash::make($request->password);
        }

        User::Where('id', $investor->user_id)
            ->update($validatedData);;

        $cek = ([
            'image' => 'image|file|max:5024',
            'no_hp' => 'min:11 | max:13 | required',
           
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
            if($request->regency_id){
                $validated['province_id'] = $request->province_id;
                $validated['regency_id'] = $request->regency_id;
                $validated['district_id'] = $request->district_id;
                $validated['village_id'] = $request->village_id;
            }
        $validated = $request->validate($cek);
        if($request->file('image')){
            $validated['image'] = $request->file('image')->store('post-image');
        }

        investor::where('id',$id)
        ->update($validated);;

        return redirect('/i/akun')->with('success', 'Berhasil mengubah akun!');
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
