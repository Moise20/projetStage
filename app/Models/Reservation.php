<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;


class Reservation extends Model implements Authenticatable
{

    use BasicAuthenticatable;
    protected $fillable = ['nbrPassager','infoPassPrincip','tel','typeBillet','cout','identifiantTransaction','statutPaiement','tx_reference','trajet_id','client_id'];

    public function trajet()
    {
        return $this->belongsTo(Trajet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
