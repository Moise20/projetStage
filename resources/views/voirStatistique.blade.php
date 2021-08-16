@extends('layouts.layoutVoirStatistique')
@section('contenu')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center"> Statistiques de la plateforme</div>

                <div class="card-body">

                    <h3>{{ $chart1->options['chart_title'] }}</h3>
                    {!! $chart1->renderHtml() !!}

                    <hr />

                    <h3>{{ $chart3->options['chart_title'] }}</h3>
                    {!! $chart3->renderHtml() !!}

                </div>

            </div>
        </div>
    </div>
</div>
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}

{!! $chart3->renderJs() !!}

@endsection