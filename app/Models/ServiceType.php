<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    protected $table = 'service_types';
    protected $hidden = ['pivot'];
    
    


    //relacion uno a muchos con turns
    public function turns(){
        return $this->hasMany('App\Models\Turn', 'id_service_type');
    }

    //belongsTo de services
    public function services(){
        return $this->belongsTo('App\Models\Service');
     }

    //  //belongsTo de queue_types
    //  public function queue_types(){
    //     return $this->belongsToMany('App\Models\QueueType','queue_service_types','id_service_type','id_queue_type');
    // }

    
}
