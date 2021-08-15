@extends('layouts.layoutModifInfoAdmin')
@section('contenu')

<form action="/modifierInformationsAdmin" method="post" class="form-horizontal m-t-20" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row p-b-30">
        <div class="col-12">
            <div class="card-body">
                <div class="card">
                    <h4 class="card-title" align="center">Modifier Informations</h4>
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
                                <font color="black">{{ $errors->first('nom') }}</font>
                            </p>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Prenom</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="text" class="form-control" name="prenom" placeholder="PrenNom Ici" value="{{ $prenom }}" required>
                        </div>
                        <div>
                            @if($errors->has('prenom'))
                            <p class="alert-danger">
                                <font color="black">{{ $errors->first('prenom') }}</font>
                            </p>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-email"></i></span>
                            </div>
                            <input type="email" class="form-control" name="email" placeholder="Email Ici" value="{{ $email }}" required>
                        </div>
                        <div>
                            @if($errors->has('email'))
                            <p class="alert-danger">
                                <font color="black">{{ $errors->first('email') }}</font>
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
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </div>
</form>

@endsection