<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependence extends Model
{
    protected $table = 'dependences';
    protected $hidden = ['pivot'];

    //relacion uno a muchos con time_block
    public function timeBlocks(){
        return $this->hasMany('App\Models\TimeBlock', 'id_dependence');
    }
    
    //relacion uno a muchos con services
    public function services(){
        return $this->hasMany('App\Models\Service', 'id_dependence');
    }

    //relacion uno a muchos con users
    public function users(){
        return $this->hasMany('App\Models\User', 'id_dependence');
    }
}
