<?php

namespace App\Http\Controllers;

use App\Models\detailTransaksi;
use App\Models\transaksiInvestasi;
use App\Models\User;
use App\Models\investor;
use App\Models\proyek;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.transaksi.index', [
            "title" => "Transaksi",
            'details' => detailTransaksi::all(),
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi =detailTransaksi::where('transaksi_id',$id)->first();
        $details = detailTransaksi::where('proyek_id',$id)->get();
        $sum = 0;
        foreach ($details as $detail){
            if ($detail->status == 'dibayar'){
            $temp = $detail->transaksi->nominal;
            $sum += $temp;
            }
        }
        $pengembalian = 0;
        if ($detail->status == 'dibayar'){
        $dana =  $transaksi->transaksi->nominal;
        $hitung = $dana/$sum *100;
        $hasil = 20/100*$hitung;
        $pengembalian += ($hasil/100*$sum)+$dana;
        }

        return view('admin.transaksi.show', [
            "title" => "transaksi",
            'detail' => $transaksi,
            'pengembalian' =>$pengembalian
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
        detailTransaksi::Where('id', $id)
        ->update(['status' => $request->status]);
    return redirect('/a/transaksi')->with('success', 'Berhasil mengedit status transaksi investasi!');
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
