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
        $proyek = proyek::where('id',$id)->first();
        $details = detailTransaksi::where('proyek_id',$id)->get();

        $sum = 0;
        foreach ($details as $detail){
            if ($detail->status == 'dibayar'){
            $temp = $detail->transaksi->nominal;
            $sum += $temp;
            }
        }

        $max = $proyek->nominal - $sum ;
        return view('investor.transaksi.create', [
            "title" => "Buat Transaksi",
            // 'posts' => transaksiInvestasi::where('user_id', auth()->user()->id)->get()
            "id" => $id,
            'max' => $max
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
        $proyek = proyek::where('id',$request->proyek_id)->first();
        $details = detailTransaksi::where('proyek_id',$request->proyek_id)->get();

        $sum = 0;
        foreach ($details as $detail){
            if ($detail->status == 'dibayar'){
            $temp = $detail->transaksi->nominal;
            $sum += $temp;
            }
        }

        $max = $proyek->nominal - $sum ;

        $transaksi = $request->validate([
            'nominal' => 'required|numeric|min:1000000|max:'.$max,
            'image' => 'image'
        ]);
        $transaksi['image'] = $request->file('image')->store('post-image');
        $transaksi['user_id'] = $investor->id;
        $trans =transaksiInvestasi::create($transaksi);

        $detail = [
            'transaksi_id' => $trans->id,
            'proyek_id'=> $request->proyek_id,
            'status' => 'diproses',
            'max' => $max
        ];
        detailTransaksi::create($detail);

        return redirect('/i/transaksi')->with('success', 'Berhasil menambahkan transaksi!');

    
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

            return redirect('/i/transaksi')->with('success', 'Berhasil mengedit data transaksi investasi!');
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


