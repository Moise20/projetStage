@extends('layouts.layoutModifierAgence')
@section('contenu')
<form action="/modifierAgence" method="post" class="form-horizontal m-t-20" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row p-b-30">
        <div class="col-12">
            <div class="card-body">
                <div class="card">
                    <h4 class="card-title" align="center">Formulaire</h4>
                </div>

                <input id="id" name="id" type="hidden" value="{{$id}}">

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nom</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="text" class="form-control" name="nom" placeholder="Nom Ici" value="{{ $nom}}" required>
                        </div>
                        <div>
                            @if($errors->has('nom'))
                            <p class="alert-danger">
                                <font color="black">{{ $errors->first('nom') }}</font>
                            </p>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label">Ville</label>
                    <div class="col-md-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon2"><i class="mdi-selection"></i></span>
                            </div>
                            <select name="ville" class="select2 form-control custom-select" required>
                                <option></option>
                                <optgroup label="">
                                    <option value="Lome">Lome</option>
                                    <option value="Kara">Kara</option>


                                </optgroup>
                            </select>

                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tel</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="tel" class="form-control" name="tel" placeholder="Tel Ici" value="{{ $tel }}" pattern="[0-9]{8}" required>
                        </div>
                        <div>
                            @if($errors->has('tel'))
                            <p class="alert-danger">
                                <font color="black">{{ $errors->first('tel') }}</font>
                            </p>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Adresse</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="text" class="form-control" name="adresse" placeholder="Adresse Ici" value="{{ $adresse }}" required>
                        </div>
                        <div> @if($errors->has('adresse'))
                            <p class="alert-danger">
                                <font color="black">{{ $errors->first('adresse') }}</font>
                            </p>
                            @endif
                        </div>
                    </div>

                </div>

                <input id="user_id" name="user_id" type="hidden" value="{{$idC}}">


            </div>
        </div>
    </div>
    </div>
    <div class="border-top">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </div>
</form>
@endsection