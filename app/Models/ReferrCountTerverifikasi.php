<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferrCountTerverifikasi extends Model
{
    use HasFactory;

    protected $table = 'referr_count_terverifikasi';

    public function user(){
        return $this->hasOne('App\Models\User','ref','ref_by');
    }
}
