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
    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }
}
