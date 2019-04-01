<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $hidden = ['pivot'];

    //relacion uno a muchos con users
    public function users(){
        return $this->hasMany('App\Models\User', 'id_role');
    }
    //relacion muchos a muchos con permissions
    public function permissions(){
    	return $this->belongsToMany('App\Models\Permission','role_permissions','id_role','id_permission');
    }


}
