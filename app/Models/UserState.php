<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserState extends Model
{
    protected $table = 'user_states';
    protected $hidden = ['pivot'];
    
        //relacion uno a muchos con users
        public function users(){
            return $this->hasMany('App\Models\User', 'id_user_state');
        }
}
