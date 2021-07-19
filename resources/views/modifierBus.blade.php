@extends('layouts.layoutModifierBus')
@section('contenu')
<form action="/modifierBus" method="post" class="form-horizontal m-t-20" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row p-b-30">
        <div class="col-12">
            <div class="card-body">
                <div class="card">
                    <h4 class="card-title" align="center">Formulaire</h4>
                </div>

                <input id="id" name="id" type="hidden" value="{{$id}}">
                
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Immatriculation</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="text" class="form-control" name="immatriculation" placeholder="Immatriculation Ici" value="{{ $immatriculation }}" required>
                        </div>
                    </div>
                    @if($errors->has('immatriculation'))
                    <p class="help is-danger">{{ $errors->first('immatriculation') }}</p>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nombre De Places</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="text" class="form-control" name="nbrePlace" placeholder="nombre de place du Bus Ici" value="{{ $nbrePlace }}"  required>
                        </div>
                    </div>
                    @if($errors->has('nbrePlace'))
                    <p class="help is-danger">{{ $errors->first('nbrePlace') }}</p>
                    @endif
                </div>
                
    <div class="border-top">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </div>
</form>
@endsection