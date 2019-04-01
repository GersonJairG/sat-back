<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semesters';
    protected $hidden = ['pivot'];

     //relacion uno a muchos con turns
     public function turns(){
        return $this->hasMany('App\Models\Turn', 'id_semester');
    }

}
