<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;


class Trajet extends Model implements Authenticatable
{

    use BasicAuthenticatable;
    protected $fillable = ['nom','villeDepart','villeArrivee','heureDepart','heureArrivee','dateDepart','tarif','nbrPlace','agence_id'];

    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

}
