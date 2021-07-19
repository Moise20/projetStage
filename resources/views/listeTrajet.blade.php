@extends('layouts.layoutListeTrajet')
@section('contenu')

<div class="card">
    <div class="card-body">
        <h5 class="card-title m-b-0">Informations Des Trajets De voyages</h5>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>
                        <label class="customcheckbox m-b-20">
                            <input type="checkbox" id="mainCheckbox" />
                            <span class="checkmark"></span>
                        </label>
                    </th>
                    
                    <th scope="col"><strong>Nom</strong></th>
                    <th scope="col"><strong>VilleDepart</strong></th>
                    <th scope="col"><strong>VilleArrivee</strong></th>
                    <th scope="col"><strong>HeureDepart</strong></th>
                    <th scope="col"><strong>HeureArrivee</strong></th>
                    <th scope="col"><strong>DateDepart</strong></th>
                    <th scope="col"><strong>tarif</strong></th>
                    <th scope="col"><strong>Nombre de Bus</strong></th>
                    <th scope="col"><strong>Agence</strong></th>
                    <th scope="col"><strong>Action</strong></th>
                </tr>
            </thead>
            <tbody class="customtable">
               @foreach($trajets as $trajet)
                <tr>
                    <th>
                        <label class="customcheckbox">
                            <input type="checkbox" class="listCheckbox" />
                            <span class="checkmark"></span>
                        </label>
                    </th>
                   
                    <td>{{$trajet->nom}}</td>
                    <td>{{$trajet->villeDepart}}</td>
                    <td>{{$trajet->villeArrivee}}</td>
                    <td>{{$trajet->heureDepart}}</td>
                    <td>{{$trajet->heureArrivee}}</td>
                    <td>{{$trajet->dateDepart}}</td>
                    <td>{{$trajet->tarif}}</td>
                    <td>{{$trajet->nbr_bus}}</td>
                    <td>{{$trajet->agenceNom}}</td>
                   
                    <td>
                        <a href="{{route('modifierTrajet.show', [$trajet->id]) }}">
                            <div class="field">
                                <div class="control">
                                    <button class="button is-link" type="submit">Modifier</button>
                                </div>
                            </div>
                        </a>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection