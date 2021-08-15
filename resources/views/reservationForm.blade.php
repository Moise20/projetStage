@extends('layouts.layoutReservationForm')
@section('contenu')
<form action="/reserverTrajet" method="post" class="form-horizontal m-t-20" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row p-b-30">
        <div class="col-12">
            <div class="card-body">
                <div class="card">
                    <h4 class="card-title" align="center">Formulaire de Reservation</h4>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nombre de passager</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="number" min="1" class="form-control" name="nbrPassager" placeholder="Nombre de passager Ici" value="{{ old('nbrPassager') }}" required>

                        </div>
                        <h6>Les enfants de 5 ans et plus doivent avoir leur propre siege</h6>
                        <div>
                            @if($errors->has('nbrPassager'))
                            <p class="alert-danger">
                                <font color="black">{{ $errors->first('nbrPassager') }}</font>
                            </p>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Passager principal</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="text" class="form-control" name="infoPassPrincip" placeholder="Nom et Prenom du passager pricipal Ici" value="{{ old('infoPassPrincip') }}" required>
                        </div>
                        <div>
                            @if($errors->has('infoPassPrincip'))
                            <p class="alert-danger">
                                <font color="black">{{ $errors->first('infoPassPrincip') }}</font>
                            </p>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Telephone</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="tel" class="form-control" name="tel" placeholder="00000000" value="{{ old('tel') }}" pattern="[0-9]{8}" required>
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
                    <label class="col-sm-3 text-right control-label col-form-label">Type de Billet</label>
                    <div class="col-md-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon2"><i class="mdi-selection"></i></span>
                            </div>
                            <select name="typeBillet" class="select2 form-control custom-select" required>
                                <option></option>
                                <optgroup label="">
                                    <option value="1">Billet Remboursable</option>
                                    <option value="2">Billet Non Remboursable</option>
                                </optgroup>
                            </select>

                        </div>
                        <h6>Svp, veuillez bien lire notre <a href="regleReservation">guide d'utilisation</a> pour plus d'informations</h6>

                    </div>
                </div>


                <input id="trajet_id" name="trajet_id" type="hidden" value="{{$trajet_id}}">

                <input id="client_id" name="client_id" type="hidden" value="{{$client_id}}">


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