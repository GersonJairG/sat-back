<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $hidden = ['pivot'];
           
         //belongsTo de modules
         public function modules(){
            return $this->belongsTo('App\Models\Module');
         }
         //belongsTo de roles
         public function roles(){
            return $this->belongsToMany('App\Models\Role','role_permissions','id_permission','id_role');
        }
}
