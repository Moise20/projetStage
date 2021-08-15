@extends('layouts.layoutListeAgence')
@section('contenu')
<div class="card">
    <div class="card-body">
        <h5 class="card-title m-b-0">Informations Des Agences</h5>
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
                    <th scope="col"><strong>Ville</strong></th>
                    <th scope="col"><strong>Tel</strong></th>
                    <th scope="col"><strong>Adresse</strong></th>
                    <th scope="col"><strong>Compagnie</strong></th>
                    <th scope="col"><strong>Action</strong></th>
                </tr>
            </thead>
            <tbody class="customtable">
               @foreach($agences as $agence)
                <tr>
                    <th>
                        <label class="customcheckbox">
                            <input type="checkbox" class="listCheckbox" />
                            <span class="checkmark"></span>
                        </label>
                    </th>
                   
                    <td>{{$agence->nom}}</td>
                    <td>{{$agence->ville}}</td>
                    <td>{{$agence->tel}}</td>
                    <td>{{$agence->adresse}}</td>
                    
                    <td>{{$agence->compagnieN}}</td>
                    <td>
                        <a href="{{route('modifierAgence.show', [$agence->id]) }}">
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