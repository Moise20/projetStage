@extends('layouts.layoutAjouterTrajet')
@section('contenu')
<form action="/ajouterTrajet" method="post" class="form-horizontal m-t-20" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row p-b-30">
        <div class="col-12">
            <div class="card-body">
                <div class="card">
                    <h4 class="card-title" align="center">Formulaire</h4>
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nom</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="text" class="form-control" name="nom" placeholder="Nom Ici" value="{{ old('nom') }}" required>
                        </div>
                    </div>
                    @if($errors->has('nom'))
                    <p class="help is-danger">{{ $errors->first('nom') }}</p>
                    @endif
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
                            <input type="time" class="form-control" name="heureDepart" placeholder="Heure Ici" value="{{ old('heureDepart') }}"  required>
                        </div>
                    </div>
                    @if($errors->has('heureDepart'))
                    <p class="help is-danger">{{ $errors->first('heureDepart') }}</p>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">HeureArrivee</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="time" class="form-control" name="heureArrivee" placeholder="Heure Ici" value="{{ old('heureArrivee') }}"  required>
                        </div>
                    </div>
                    @if($errors->has('heureArrivee'))
                    <p class="help is-danger">{{ $errors->first('heureArrivee') }}</p>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">DateDepart</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="date"  class="form-control" name="dateDepart" placeholder="Date De Depart Ici" value="{{ old('dateDepart') }}" required>
                        </div>
                    </div>
                    @if($errors->has('dateDepart'))
                    <p class="help is-danger">{{ $errors->first('dateDepart') }}</p>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tarif</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="text" class="form-control" name="tarif" placeholder="tarif Ici" value="{{ old('tarif') }}" required>
                        </div>
                    </div>
                    @if($errors->has('tarif'))
                    <p class="help is-danger">{{ $errors->first('tarif') }}</p>
                    @endif
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label">Nombre Bus</label>
                    <div class="col-md-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon2"><i class="mdi-selection"></i></span>
                            </div>
                            <select name="nbr_bus" class="select2 form-control custom-select" required>
                                <option></option>
                                <optgroup label="">
                                    <option value="1">1 Bus</option>
                                    <option value="2">2 Bus</option>
                                    <option value="3">3 Bus</option>

                                </optgroup>
                            </select>

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