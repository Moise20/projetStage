<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class busController extends Controller
{
    public function formulaire()
    {
        return view('ajouterBus');
    }

    public function traitement()
    {
        request()->validate([
            'immatriculation'=>['required'],
            'nbrePlace'=>['required'],
           
        ]);

        $bus = Bus::create([
            'immatriculation' => (request('immatriculation')),
            'nbrePlace' => (request('nbrePlace')),
        ]);

        flash("Les informations ont bien été enregistrees.")->success();
        return redirect('/ajouterBus');
    }

    public function listeBus()
    {
        $bus=Bus::all();
        return view('listeBus',[
            'buss'=>$bus,
        ]);
    }

    public function formulaireModif($id)
    {
        $bus=Bus::findOrFail($id);
        return view('modifierBus',[
            'id'=>$bus->id,
            'immatriculation'=>$bus->immatriculation,
            'nbrePlace'=>$bus->nbrePlace,
        ]);
    }

    public function traitementModif(Request $request, Bus $bus)
    {
        request()->validate([
            'id'=>['required'],
            'immatriculation'=>['required'],
            'nbrePlace'=>['required'],
           
        ]);  

        $id = ($request->input('id'));
        $bus=Bus::where('id', $id)->update([

            'immatriculation' => ($request->input('immatriculation')),
            'nbrePlace' => ($request->input('nbrePlace')),
           
            
        ]);

        flash("Les informations ont bien été mise à jour.")->success();
        return redirect('/listeBus');
    }
}
