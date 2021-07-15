@extends('layouts.layoutConnexionClient')
@section('contenu')
<form class="form-horizontal m-t-20" id="loginform" action="/connexionClient" method="post">
    {{ csrf_field() }}
    <div class="row border-top border-secondary">
        <div class="col-12">
            <div class="form-group">
                <div class="p-t-20">
                    <a href="">
                        <button class="btn btn-info"  type="button"><i class="fa fa-lock m-r-5"></i> Pas Encore Inscrit?</button>
                    </a>
                    <a href="/inscriptionClient">
                        <button class="btn btn-success float-right" type="button">Inscription</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row p-b-30">
        <div class="col-12">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                </div>
                <input type="text" class="form-control form-control-lg" name="email" placeholder=" Addresse Email" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                </div>
                <input type="password" class="form-control form-control-lg" name="password" placeholder="Mot De Passe" aria-label="Password" aria-describedby="basic-addon1" required="">
            </div>
        </div>
    </div>
    <div class="row border-top border-secondary">
        <div class="col-12">
            <div class="form-group">
                <div class="p-t-20">
                    <a href="/password-resetClient">
                        <button class="btn btn-info" id="to-recover" type="button"><i class="fa fa-lock m-r-5"></i>Mot De Passe Perdu?</button>
                    </a>
                    <button class="btn btn-success float-right" type="submit">Connectez-vous</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection