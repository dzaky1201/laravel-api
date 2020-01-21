<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $fillable =[
        'image', 'nama_pemilik', 'nomor_hp', 'alamat'
    ];
}
