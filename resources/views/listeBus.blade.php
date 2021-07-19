@extends('layouts.layoutListeBus')
@section('contenu')
<div class="card">
    <div class="card-body">
        <h5 class="card-title m-b-0">Informations Des Bus</h5>
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
                    
                    <th scope="col"><strong>Immatriculation</strong></th>
                    <th scope="col"><strong>nombre de places</strong></th>
                    <th scope="col"><strong>Action</strong></th>
                </tr>
            </thead>
            <tbody class="customtable">
               @foreach($buss as $bus)
                <tr>
                    <th>
                        <label class="customcheckbox">
                            <input type="checkbox" class="listCheckbox" />
                            <span class="checkmark"></span>
                        </label>
                    </th>
                   
                    <td>{{$bus->immatriculation}}</td>
                    <td>{{$bus->nbrePlace}}</td>
                    
                    
                   
                    <td>
                        <a href="{{route('modifierBus.show', [$bus->id]) }}">
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