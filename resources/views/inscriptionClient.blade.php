@extends('layouts.layoutInscriptionClient')
@section('contenu')
<!-- Form -->
<form action="/inscriptionClient" method="post" class="form-horizontal m-t-20">
    {{ csrf_field() }}
    <div class="row p-b-30">
        <div class="col-12">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                </div>
                <input type="text" class="form-control form-control-lg" name="nom" placeholder="Nom" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <div>
                @if($errors->has('nom'))
                <p class="alert-danger">
                    <font color="black">{{ $errors->first('nom') }}</font>
                </p>
                @endif
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                </div>
                <input type="text" class="form-control form-control-lg" name="prenom" placeholder="Prenom" aria-label="UserFirstname" aria-describedby="basic-addon1" required>
            </div>
            <div>
                @if($errors->has('prenom'))
                <p class="alert-danger">
                    <font color="black">{{ $errors->first('prenom') }}</font>
                </p>
                @endif
            </div>
            <!-- email -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                </div>
                <input type="text" class="form-control form-control-lg" name="email" placeholder="Addresse Email" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <div>
                @if($errors->has('email'))
                <p class="alert-danger">
                    <font color="black">{{ $errors->first('email') }}</font>
                </p>
                @endif
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                </div>
                <input type="text" class="form-control form-control-lg" name="password" placeholder="Mot De Passe" aria-label="Password" aria-describedby="basic-addon1" required>
            </div>
            <div>
                @if($errors->has('password'))
                <p class="alert-danger">
                    <font color="black">{{ $errors->first('password') }}</font>
                </p>
                @endif
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                </div>
                <input type="text" class="form-control form-control-lg" name="password_confirmation" placeholder=" Confirmer Mot De Passe " aria-label="Password" aria-describedby="basic-addon1" required>
            </div>
            <div>
                @if($errors->has('password_confirmation'))
                <p class="alert-danger">
                    <font color="black">{{ $errors->first('password_confirmation') }}</font>
                </p>
                @endif
            </div>

            <input id="role" name="role" type="hidden" value="3">

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                </div>
                <input type="date" min="1900-01-01" class="form-control form-control-lg" name="date_naissance" placeholder="  " aria-label="date" aria-describedby="basic-addon1" required>
            </div>
            <div>
                @if($errors->has('date_naissance'))
                <p class="alert-danger">
                    <font color="black">{{ $errors->first('date_naissance') }}</font>
                </p>
                @endif
            </div>


        </div>
    </div>
    <div class="row border-top border-secondary">
        <div class="col-12">
            <div class="form-group">
                <div class="p-t-20">
                    <button class="btn btn-block btn-lg btn-info" type="submit">Valider</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top border-secondary">
        <div class="col-12">
            <div class="form-group">
                <div class="p-t-20">
                    <a href="/connexionClient">
                        <button class="btn btn-block btn-lg btn-info" type="button">Connectez-vous</button>
                        <a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection