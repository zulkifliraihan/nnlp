<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPayments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_rekening',
        'jumlah_transfer',
        'file_id',
    ];

    public function file(){
        return $this->hasOne('App\Models\File','id','file_id');
    }
}
