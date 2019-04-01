<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TurnState extends Model
{
    protected $table = 'turn_states';
    protected $hidden = ['pivot'];

    //relacion uno a muchos con turns
    public function turns(){
        return $this->hasMany('App\Models\Turn', 'id_turn_state');
    }
}
