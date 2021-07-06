@extends('layouts.layoutPassword')
@section('contenu')
<form class="form-horizontal m-t-20" id="loginform" action="/reset-password" method="post">
    {{ csrf_field() }}
    <div class="row border-top border-secondary">
        <div class="col-12">
            <div class="form-group">
                <div class="p-t-20">

                </div>
            </div>
        </div>
    </div>

    <div class="row p-b-30">
        <div class="col-12">

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                </div>
                <input type="password" class="form-control form-control-lg" name="password" placeholder="Mot De Passe" aria-label="Password" aria-describedby="basic-addon1" required="">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                </div>
                <input type="password" class="form-control form-control-lg" name="password_confirmation" placeholder=" Confirmer Mot de passe" aria-label="Password" aria-describedby="basic-addon1" required="">
            </div>

            <input id="token" name="token" type="hidden" value="{{$token}}">
        </div>
    </div>
    <div class="row border-top border-secondary">
        <div class="col-12">
            <div class="form-group">
                <div class="p-t-20">

                    <a class="btn btn-success" href="/connexionAdministrateur" id="to-login" name="action">Page Connexion</a>
                    
                    <button class="btn btn-success float-right" type="submit">Envoyer</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection