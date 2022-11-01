<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
     //Relations between models (foriegn keys)
    //Appointments have a column user_id which refers to id in users table 
     public function users(){
        return $this->belongsTo(Users::class,'user_id', 'id');
    }
 //Appointments have a column specialty_id which refers to id in specialty table
    public function specialties(){
        return $this->belongsTo(Specialties::class,'specialty_id', 'id');
    }

}
