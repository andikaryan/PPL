<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailTransaksi extends Model
{
    use HasFactory;
    protected $guarded =[
        'id'
    ];

    public function transaksi()
    {
        return $this->belongsTo(transaksiInvestasi::class,'transaksi_id');
    }
    public function proyek()
    {
        return $this->belongsTo(proyek::class,'proyek_id');
    }
}
