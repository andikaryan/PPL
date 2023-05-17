<?php

namespace App\Http\Controllers;

use App\Models\detailTransaksi;
use App\Models\transaksiInvestasi;
use App\Models\User;
use App\Models\investor;
use App\Models\proyek;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class InvestorTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        
        return view('investor.transaksi.index', [
            "title" => "Transaksi",
            'details' => detailTransaksi::all(),
            'investor' => investor::where('user_id', $user->id)->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('investor.transaksi.create', [
            "title" => "Buat Transaksi",
            // 'posts' => transaksiInvestasi::where('user_id', auth()->user()->id)->get()
            "id" => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $investor = investor::where('user_id', $user->id)->first();
        // $proyek = proyek::where('id',$id)->first();
        $transaksi = $request->validate([
            'nominal' => 'required|numeric|min:1000000',
            'image' => 'image'
        ]);
        $transaksi['image'] = $request->file('image')->store('post-image');
        $transaksi['user_id'] = $investor->id;
        $trans =transaksiInvestasi::create($transaksi);

        $detail = [
            'transaksi_id' => $trans->id,
            'proyek_id'=> $request->proyek_id,
            'status' => 'diproses'
        ];
        detailTransaksi::create($detail);

        return redirect('/i/proyek')->with('success', 'Berhasil menambahkan transaksi!');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('investor.transaksi.show', [
            "title" => "transaksi",
            'detail' => detailTransaksi::where('transaksi_id',$id)->first()

            // 'investor' => investor::where('user_id', $user->id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('investor.transaksi.edit', [
            "title" => "Edit Transaksi",
            'transaksi' => transaksiInvestasi::where('id', $id)->first()
            // "id" => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $edit = [
            'nominal' => 'required|numeric|min:1000000'
        ];

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }}
        $validatedData = $request->validate($edit);
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-image');
        }
        
        transaksiInvestasi::Where('id', $id)
            ->update($validatedData);;

            return redirect('/i/transaksi')->with('success', 'Berhasil mengedit investasi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


