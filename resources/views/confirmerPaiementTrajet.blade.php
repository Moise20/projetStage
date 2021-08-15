@extends('layouts.layoutConfirmerPaiementTrajet')
@section('contenu')
<form action="/finaliserPaiement" method="post" class="form-horizontal m-t-20" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row p-b-30">
        <div class="col-12">
            <div class="card-body">
                <div class="card">
                    <h4 class="card-title" align="center">Confirmation de Paiement</h4>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nombre de passager</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="number" min="1" class="form-control" name="identifier" placeholder="Identifiant du paiement Ici" value="{{ old('identifier') }}" required>

                        </div>
                        <h6>L'identifiant vous a ete envoye par sms apres votre paiement</h6>
                        <div>
                            @if($errors->has('identifier'))
                            <p class="alert-danger">
                                <font color="black">{{ $errors->first('identifier') }}</font>
                            </p>
                            @endif
                        </div>
                    </div>

                </div>

                <div>
                    <h6>Nous vous enverons la facture de votre reservation par mail et par sms</h6>
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