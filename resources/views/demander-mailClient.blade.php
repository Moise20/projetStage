@extends('layouts.layoutRecuperationMailClient')
@section('contenu')
<div class="text-center">
    <span class="text-white">Entrer votre e-mail .Vous recevrez un Mail</span>
</div>
<form class="col-12" action="/password-resetClient" method="post">
    {{ csrf_field() }}
    <!-- email -->

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
        </div>
        <input type="text" class="form-control form-control-lg" name="email" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <!-- pwd -->

    <div class="row m-t-20 p-t-20 border-top border-secondary">
        <div class="col-12">
            <a class="btn btn-success" href="/connexionClient" id="to-login" name="action">Page Connexion</a>
            <button class="btn btn-info float-right" type="submit" name="action">Recouvrir</button>
        </div>
    </div>

</form>

@endsection