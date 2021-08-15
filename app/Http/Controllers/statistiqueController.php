<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use ArielMejiaDev\LarapexCharts;
//use ArielMejiaDev\LarapexCharts\LarapexChart;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;




class statistiqueController extends Controller
{
    public function voirStatistiques()
    {

        $chart_options = [
            'chart_title' => 'Utilisateurs par mois',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);

        return view('voirStatistique', compact('chart1'));
    }
}
