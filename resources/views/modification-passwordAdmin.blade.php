@extends('layouts.layoutModificationPasswordAdmin')
@section('contenu')
<form class="form-horizontal" action="/modification-passwordAdmin" method="post">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="card">
            <h4 class="card-title" align="center"><u>Modification Mot de Passe</u></h4>
        </div>


        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Mot De Passe</label>
            <div class="col-sm-9">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password" id="fname" placeholder="Password Ici" value="{{ old('password') }}" required>
                </div>
                <div>
                    @if($errors->has('password'))
                    <p class="alert-danger">
                        <font color="black">{{ $errors->first('password') }}</font>
                    </p>
                    @endif
                </div>
            </div>

        </div>

        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Mot De Passe(Confirmation)</label>
            <div class="col-sm-9">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password_confirmation" id="fname" placeholder="Confirmation Password Ici" value="{{ old('password_confirmation') }}" required>
                </div>
                <div>
                    @if($errors->has('password_confirmation'))
                    <p class="alert-danger">
                        <font color="black">{{ $errors->first('password_confirmation') }}</font>
                    </p>
                    @endif
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