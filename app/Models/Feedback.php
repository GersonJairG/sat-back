<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';
    protected $hidden = ['pivot'];

 //belongsTo de turns
    public function turns(){
        return $this->belongsTo('App\Models\Turn');
    }

}
