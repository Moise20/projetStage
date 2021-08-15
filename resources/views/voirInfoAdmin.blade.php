@extends('layouts.layoutVoirInfoAdmin')
@section('contenu')

<div class="card">
    <div class="card-body">
        <h5 class="card-title m-b-0">Informations De l'Administrateur</h5>
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
                    <th scope="col"><strong>Prenom</strong></th>
                    <th scope="col"><strong>Email</strong></th>
                    <th scope="col"><strong>Action</strong></th>
                    
                </tr>
            </thead>
            <tbody class="customtable">
               
                <tr>
                    <th>
                        <label class="customcheckbox">
                            <input type="checkbox" class="listCheckbox" />
                            <span class="checkmark"></span>
                        </label>
                    </th>
                   
                    <td>{{$admin->nom}}</td>
                    <td>{{$admin->prenom}}</td>
                    <td>{{$admin->email}}</td>
                    
                    <td>
                        <a href="{{route('modifierInformationsAdmin.show', [$admin->id]) }}">
                            <div class="field">
                                <div class="control">
                                    <button class="button is-link" type="submit">Modifier</button>
                                </div>
                            </div>
                        </a>
                    </td>
                </tr>
               
            </tbody>
        </table>
    </div>
</div>


@endsection