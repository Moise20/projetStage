@extends('layouts.layoutAffichageColisForm')
@section('contenu')

<form action="/envoyerColis" method="post" class="form-horizontal m-t-20" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="nom" placeholder="Nom du colis Ici" value="{{ old('nom') }}" required>
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
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Poids du colis</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="number" min="1" class="form-control" name="poids" placeholder="poids du colis en kg Ici" value="{{ old('poids') }}" required>
                        </div>
                        <div>
                            @if($errors->has('poids'))
                            <p class="alert-danger">
                                <font color="black">{{ $errors->first('poids') }}</font>
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
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nom Destinataire</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="text" class="form-control" name="nomDestinataire" placeholder="Nom du destinataire Ici" value="{{ old('nomDestinataire') }}" required>
                        </div>
                        <div>
                            @if($errors->has('nomDestinataire'))
                            <p class="alert-danger">
                                <font color="black">{{ $errors->first('nomDestinataire') }}</font>
                            </p>
                            @endif
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
                            <input type="tel" class="form-control" name="numTelDestinataire" placeholder="Tel du destinataire Ici" value="{{ old('numTelDestinataire') }}" pattern="[0-9]{8}" required>
                        </div>
                        <div>
                            @if($errors->has('numTelDestinataire'))
                            <p class="alert-danger">
                                <font color="black">{{ $errors->first('numTelDestinataire') }}</font>
                            </p>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Date de Convoyage</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="date" class="form-control" name="dateConvoyage" placeholder="Date De convoyage Ici" value="{{ old('dateConvoyage') }}" required>
                        </div>
                        <div>
                            @if($errors->has('dateConvoyage'))
                            <p class="alert-danger">
                                <font color="black">{{ $errors->first('dateConvoyage') }}</font>
                            </p>
                            @endif
                        </div>
                        <h6>Svp, veuillez bien lire notre <a href="regleReservation">guide d'utilisation</a> pour plus d'informations sur l'envois des colis</h6>
                    </div>

                </div>
                <input id="client_id" name="client_id" type="hidden" value="{{$client_id}}">
                
                
                

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