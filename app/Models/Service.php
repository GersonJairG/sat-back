<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $hidden = ['pivot'];

    //relacion uno a muchos con service_types
    public function serviceTypes(){
        return $this->hasMany('App\Models\ServiceType', 'id_service');
    }

    //belongsTo de dependences
    public function dependences(){
        return $this->belongsTo('App\Models\Dependence');
     }



}
