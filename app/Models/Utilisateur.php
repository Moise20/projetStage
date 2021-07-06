<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;


class Utilisateur extends Model implements Authenticatable
{

    use BasicAuthenticatable;
    protected $fillable = ['id','nom','prenom','email','password','role','date_naissance','num_tel','localisation','photo','chef_agence'];

}
