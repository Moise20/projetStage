@extends('layouts.layoutListeColis')
@section('contenu')
<div class="card">
    <div class="card-body">
        <h5 class="card-title m-b-0">Informations fournies sur les Colis</h5>
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
                    
                    <th scope="col"><strong>Colis</strong></th>
                    <th scope="col"><strong>Poids</strong></th>
                    <th scope="col"><strong>Ville Depart</strong></th>
                    <th scope="col"><strong>Ville Arrivee</strong></th>
                    <th scope="col"><strong>nom Destinataire</strong></th>
                    <th scope="col"><strong>Tel Destinataire</strong></th>
                    <th scope="col"><strong>tarif</strong></th>
                    <th scope="col"><strong>Date de convoyage</strong></th>
                    
                    <th scope="col"><strong>Action</strong></th>
                </tr>
            </thead>
            <tbody class="customtable">
               @foreach($colis as $coli)
                <tr>
                    <th>
                        <label class="customcheckbox">
                            <input type="checkbox" class="listCheckbox" />
                            <span class="checkmark"></span>
                        </label>
                    </th>
                   
                    <td>{{$coli->nom}}</td>
                    <td>{{$coli->poids}}</td>
                    <td>{{$coli->villeDepart}}</td>
                    <td>{{$coli->villeArrivee}}</td>
                    <td>{{$coli->nomDestinataire}}</td>
                    <td>{{$coli->numTelDestinataire}}</td>
                    <td>{{$coli->tarif}}F CFA</td>
                    <td>{{$coli->dateConvoyage}}</td>
                    
                   
                    <td>
                        <a href="{{route('modifierColis.show', [$coli->id]) }}">
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