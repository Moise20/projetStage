@extends('layouts.layoutAffichageSearchTrajetForm')
@section('contenu')

<form action="/rechercherTrajet" method="post" class="form-horizontal m-t-20" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row p-b-30">
        <div class="col-12">
            <div class="card-body">
                <div class="card">
                    <h4 class="card-title" align="center">Rechercher un Trajet</h4>
                </div>


                <div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label">Destination</label>
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
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Date Depart</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="date" class="form-control" name="dateDepart" placeholder="Date De Depart Ici" value="{{ old('dateDepart') }}" required>
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






            </div>
        </div>
    </div>
    </div>
    <div class="border-top">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </div>
    </div>
</form>

@endsection