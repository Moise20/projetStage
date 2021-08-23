@extends('layouts.layoutClientsDesTrajets')
@section('contenu')

<div class="card">
    <div class="card-body">
        <h5 class="card-title m-b-0" align="center"><u>Clients ayants reserves le trajet selectionne</u></h5>
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
                    <th>
                        <a href="listeTrajet">
                            <div class="field">
                                <div class="control">
                                    <button class='fas fa-arrow-circle-left' type="submit"></button>
                                </div>
                            </div>
                        </a>
                    </th>
                    <th scope="col"><strong>Nom</strong></th>
                    <th scope="col"><strong>VilleDepart</strong></th>
                    <th scope="col"><strong>VilleArrivee</strong></th>
                    <th scope="col"><strong>HeureDepart</strong></th>

                    <th scope="col"><strong>DateDepart</strong></th>

                    <th scope="col"><strong>Nombre de Passagers</strong></th>
                    <th scope="col"><strong>Compagnie</strong></th>
                    

                </tr>
            </thead>
            <tbody class="customtable">
                @foreach($infosClients as $infosClient)
                <tr>
                    <th>
                        <label class="customcheckbox">
                            <input type="checkbox" class="listCheckbox" />
                            <span class="checkmark"></span>
                        </label>
                    </th>
                    <td></td>
                    <td>{{$infosClient->infoPassPrincip}}</td>
                    <td>{{$infosClient->villeDepart}}</td>
                    <td>{{$infosClient->villeArrivee}}</td>
                    <td>{{$infosClient->heureDepart}}</td>

                    <td>{{$infosClient->dateDepart}}</td>

                    <td>{{$infosClient->nbrPassager}}</td>
                    <td>{{$infosClient->nom}}</td>

                    



                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection