<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialties extends Model
{
    //A specialty can be booked many times (1 to many )
    public function appointments() {
        return $this->hasMany(Appointments::class, 'specialty_id');
    }

}
