<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'document', 'name', 'lastname', 'email', 'phone', 'id_role', 'id_user_state','id_dependence', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //relacion uno a muchos con turns
    public function turns(){
        return $this->hasMany('App\Models\Turn', 'user');
    }

     //belongsTo de roles
     public function roles(){
        return $this->belongsTo('App\Models\Role');
     }

     //belongsTo de user_states
     public function userStates(){
        return $this->belongsTo('App\Models\UserState');
     }

     //belongsTo de dependences
     public function dependencies(){
        return $this->belongsTo('App\Models\Dependence');
     }



}
