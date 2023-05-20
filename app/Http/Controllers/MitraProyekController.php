<?php

namespace App\Http\Controllers;

use App\Models\proyek;
use App\Models\mitra;
use App\Models\detailTransaksi;
use App\Models\pengembalian;

use Illuminate\Http\Request;

class MitraProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mitra = mitra::where('user_id',auth()->user()->id)->first();
        $id = $mitra->id;
        return view('mitra.proyek.index', [
            'title' => 'Proyek Saya',
            'proyeks' => proyek::where('user_id', $id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mitra.proyek.create', [
            "title" => "Tambah Proyek",
            'proyeks' => proyek::where('user_id', auth()->user()->id)->get()
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
        $user = mitra::where('user_id', auth()->user()->id)->first();
        $validatedData = $request->validate([
            'nama_proyek' => 'required|max:255',
            'nominal' => 'required|numeric',
            'deskripsi' => 'required',
            'tgl_dibuka' => 'required|date',
            'tgl_ditutup' => 'required|date',
            'tgl_kembali' => 'required|date',
        ]);
        $validatedData['user_id'] = $user->id;
        $validatedData['deskripsi'] = strip_tags($request->deskripsi);
        $validatedData['status'] = 'diproses';

        proyek::create($validatedData);

        return redirect('/m/proyek')->with('success', 'Berhasil menambahkan data proyek investasi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyek = proyek::where('id', $id)->first();    
        $details = detailTransaksi::where('proyek_id',$id)->get();
        
        $sum = 0;
        foreach ($details as $detail){
            if ($detail->status == 'dibayar'){
            $temp = $detail->transaksi->nominal;
            $sum += $temp;
            }
        }

        $pengembalian = $sum * (130/100);
        
        // $sum = sum()
        return view('mitra.proyek.show', [
            'proyek' => $proyek,
            'title' => $proyek->nama_proyek,
            'sum'   => $sum,
            'pengembalian' => $pengembalian,
            'status' => pengembalian::where('proyek_id',$id)->first()
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
        $proyek = proyek::where('id', $id)->first();
        return view('mitra.proyek.edit', [
            'proyek' => $proyek,
            'title' => $proyek->nama_proyek,
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
        $validatedData = $request->validate([
            'nama_proyek' => 'required|max:255',
            'nominal' => 'required|numeric',
            'deskripsi' => 'required',
            'tgl_dibuka' => 'required|date',
            'tgl_ditutup' => 'required|date',
            'tgl_kembali' => 'required|date',
        ]);
        $validatedData['deskripsi'] = strip_tags($request->deskripsi);
        proyek::Where('id', $id)
            ->update($validatedData);;

        return redirect('/m/proyek')->with('success', 'Berhasil mengedit proyek investasi !');
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
