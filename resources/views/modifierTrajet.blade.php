@extends('layouts.layoutModifierTrajet')
@section('contenu')

<form action="/modifierTrajet" method="post" class="form-horizontal m-t-20" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="nom" placeholder="Nom Ici" value="{{ $nom }}" required>
                        </div>
                        <div>
                            @if($errors->has('nom'))
                            <p class="alert-danger">
                                <font>{{ $errors->first('nom') }}</font>
                            </p>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label">VilleDepart</label>
                    <div class="col-md-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon2"><i class="mdi-selection"></i></span>
                            </div>
                            <select name="villeDepart" class="select2 form-control custom-select" required>
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
                    <label class="col-sm-3 text-right control-label col-form-label">VilleArrivee</label>
                    <div class="col-md-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon2"><i class="mdi-selection"></i></span>
                            </div>
                            <select name="villeArrivee" class="select2 form-control custom-select" required>
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
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">HeureDepart</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="time" class="form-control" name="heureDepart" placeholder="Heure Ici" value="{{ $heureDepart}}" required>
                        </div>
                        <div>
                            @if($errors->has('heureDepart'))
                            <p class="alert-danger">
                                <font>{{ $errors->first('heureDepart') }}</font>
                            </p>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">HeureArrivee</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="time" class="form-control" name="heureArrivee" placeholder="Heure Ici" value="{{ $heureArrivee}}" required>
                        </div>
                        <div>
                            @if($errors->has('heureArrivee'))
                            <p class="alert-danger">
                                <font>{{ $errors->first('heureArrivee') }}</font>
                            </p>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">DateDepart</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="date" class="form-control" name="dateDepart" placeholder="Date De Depart Ici" value="{{ $dateDepart }}" required>
                        </div>
                        <div>
                            @if($errors->has('dateDepart'))
                            <p class="alert-danger">
                                <font color="black">{{ $errors->first('dateDepart') }}</font>
                            </p>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tarif</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="text" class="form-control" name="tarif" placeholder="tarif Ici" value="{{ $tarif }}" required>
                        </div>
                        <div>
                            @if($errors->has('tarif'))
                            <p class="alert-danger">
                                <font color="black">{{ $errors->first('tarif') }}</font>
                            </p>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nombre de place</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="number" min="1" class="form-control" name="nbrPlace" placeholder="Nombre de place Ici" value="{{ $nbrPlace }}" required>
                        </div>
                        <div>
                            @if($errors->has('nbrPlace'))
                            <p class="alert-danger">
                                <font color="black">{{ $errors->first('nbrPlace') }}</font>
                            </p>
                            @endif
                        </div>
                    </div>

                </div>


                <div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label">Agence</label>
                    <div class="col-md-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon2"><i class="mdi-selection"></i></span>
                            </div>
                            <select name="agence_id" class="select2 form-control custom-select" required>
                                <option></option>
                                <optgroup label="">
                                    @foreach($agences as $agence)
                                    <option value="{{$agence->id}}">{{$agence->nom}}</option>
                                    @endforeach
                                </optgroup>
                            </select>

                        </div>
                    </div>
                </div>
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