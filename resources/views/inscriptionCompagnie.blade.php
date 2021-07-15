@extends('layouts.layoutInscriptionCompagnie')
@section('contenu')
<!-- Form -->
<form action="/inscriptionCompagnie" method="post" class="form-horizontal m-t-20">
    {{ csrf_field() }}
    <div class="row p-b-30">
        <div class="col-12">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                </div>
                <input type="text" class="form-control form-control-lg" name="nom" placeholder="Nom" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            
            <!-- email -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                </div>
                <input type="text" class="form-control form-control-lg" name="email" placeholder="Addresse Email" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                </div>
                <input type="text" class="form-control form-control-lg" name="password" placeholder="Mot De Passe" aria-label="Password" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                </div>
                <input type="text" class="form-control form-control-lg" name="password_confirmation" placeholder=" Confirmer Mot De Passe " aria-label="Password" aria-describedby="basic-addon1" required>
            </div>

            <input id="role" name="role" type="hidden" value="2">

            



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
                    <a href="/connexionCompagnie">
                        <button class="btn btn-block btn-lg btn-info" type="button">Connectez-vous</button>
                        <a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection