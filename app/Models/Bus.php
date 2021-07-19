<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;


class Bus extends Model implements Authenticatable
{

    use BasicAuthenticatable;

    /*Table associe au modele*/ 
    protected $table='bus';

    protected $fillable = ['immatriculation','nbrePlace'];

    
    

}
