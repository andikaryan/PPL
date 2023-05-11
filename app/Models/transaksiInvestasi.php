<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksiInvestasi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    public function investor()
    {
        return $this->belongsTo(investor::class, 'user_id');
    }
    public function detailTransaksi()
    {
        return $this->hasMany(detailTransaksi::class);
    }
}
