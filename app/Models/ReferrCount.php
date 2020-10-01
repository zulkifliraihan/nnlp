<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferrCount extends Model
{
    protected $table = 'referr_count';

    public function user(){
        return $this->hasOne('App\Models\User','ref','ref_by');
    }
}
