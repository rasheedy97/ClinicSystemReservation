<?php

namespace App\Models;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;

class Users extends Model implements Authenticatable
{
    use AuthenticableTrait;
    public function appointments() {
        
        return $this->hasMany(Appointments::class, 'user_id');
    }

    protected $fillable = ['name', 'email', 'password'];

}

