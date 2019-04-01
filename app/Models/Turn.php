<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    protected $table = 'turns';
    protected $hidden = ['pivot'];

     //relacion uno a uno con feedback
     public function feedbacks(){
        return $this->hasOne('App\Models\Feedback', 'id_turn');
     }
    
     //belongsTo de turn_state
     public function turnStates(){
        return $this->belongsTo('App\Models\TurnState');
     }

     //belongsTo de service_types
    public function serviceTypes(){
        return $this->belongsTo('App\Models\ServiceType');
     }

      //belongsTo de users
      public function users(){
        return $this->belongsTo('App\Models\User');
     }

     //belonsTo de semesters
     public function semesters(){
        return $this->belongsTo('App\Models\Semester');
     }
}
