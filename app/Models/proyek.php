<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyek extends Model
{
    use HasFactory;
    protected $guarded =[
        'id'
    ];
    public function mitra()
    {
        return $this->belongsTo(mitra::class,'user_id');
    }
    public function detail()
    {
        return $this->hasMany(detailTransaksi::class);
    }
    public function pengembalian()
    {
        return $this->hasMany(pengembalian::class);
    }
}
