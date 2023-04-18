<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'slug',
        'excerpt',
        'image',
        'body',

    ];
    
    public function mitra()
    {
        return $this->belongsTo(mitra::class,'user_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => ['judul']
    //         ]
    //     ];
    // }
}
