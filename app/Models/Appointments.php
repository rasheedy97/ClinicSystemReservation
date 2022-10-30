<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    
    public function user(){
        return $this->belongsTo(Users::class,'id');
    }


}
