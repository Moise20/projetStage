<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;


class Colis extends Model implements Authenticatable
{

    use BasicAuthenticatable;

    /*Table associe au modele*/
    protected $table = 'colis';

    protected $fillable = ['nom','poids', 'villeDepart', 'villeArrivee', 'nomDestinataire', 'numTelDestinataire', 'dateConvoyage','tarif','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
