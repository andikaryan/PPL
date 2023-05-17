<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    use HasFactory;
    protected $guarded =[
        'id'
    ];

    public function proyek()
    {
        return $this->belongsTo(proyek::class,'proyek_id');
    }
}
