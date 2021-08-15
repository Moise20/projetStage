@extends('layouts.layoutListeUser')
@section('contenu')
<div class="card">
    <div class="card-body">
        <h5 class="card-title m-b-0">Informations Du Client</h5>
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
                  
                    <th scope="col"><strong>Email</strong></th>
                    <th scope="col"><strong>Adresse</strong></th>
                    <th scope="col"><strong>Photo</strong></th>
                    <th scope="col"><strong>Action</strong></th>
                </tr>
            </thead>
            <tbody class="customtable">
                @foreach($users as $user)
                <tr>
                    <th>
                        <label class="customcheckbox">
                            <input type="checkbox" class="listCheckbox" />
                            <span class="checkmark"></span>
                        </label>
                    </th>

                    <td>{{$user->nom}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->localisation}}</td>

                    <td>
                        <img src="/storage/{{$user->photo}}" alt="Photo">
                    </td>
                    <td>
                        <a href="{{route('supprimerUser.show', [$user->id]) }}">
                            <div class="field">
                                <div class="control">
                                    <button class="button is-link" type="submit">Supprimer</button>
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