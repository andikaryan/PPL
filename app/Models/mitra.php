<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class mitra extends Authenticatable
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function blog()
    {
        return $this->hasMany(blog::class);
    }
    public function proyek()
    {
        return $this->hasMany(proyek::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    // public function provinsi()
    // {
    //     return $this->belongsTo(Province::class,'provinsi_id');
    // }
    // public function kabupaten()
    // {
    //     return $this->belongsTo(Regency::class,'kabupaten_id');
    // }
    // public function kecamatan()
    // {
    //     return $this->belongsTo(District::class,'kecamatan_id');
    // }
    // public function desa()
    // {
    //     return $this->belongsTo(Village::class,'desa_id');
    // }
        
    public function province()
    {
        return $this->belongsTo(Province::class,'province_id');
    }
    public function regency()
    {
        return $this->belongsTo(Regency::class,'regency_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class,'district_id');
    }
    public function village()
    {
        return $this->belongsTo(Village::class,'village_id');
    }


}
