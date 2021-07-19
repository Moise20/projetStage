<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;


class Agence extends Model implements Authenticatable
{

    use BasicAuthenticatable;
    protected $fillable = ['nom','ville','tel','adresse','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trajet()
    {
        return $this->hasMany(Trajet::class);
    }

}
