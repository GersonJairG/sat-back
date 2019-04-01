<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';
    protected $hidden = ['pivot'];
    
        //relacion uno a muchos con permissions
        public function permissions(){
            return $this->hasMany('App\Models\Permission', 'id_module');
        }
}
