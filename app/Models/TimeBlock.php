<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeBlock extends Model
{
    protected $table = 'time_blocks';
    protected $hidden = ['pivot'];

    //belongsTo de dependences
    public function dependences(){
       return $this->belongsTo('App\Models\Dependence');
    }
}
