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
            'chart_title' => 'Utilisateurs par jour',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);

        /*$chart_options = [
            'chart_title' => 'Transactions by user',
            'chart_type' => 'line',
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\Transaction',
        
            'relationship_name' => 'user', // represents function user() on Transaction model
            'group_by_field' => 'name', // users.name
        
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',
            
            'filter_field' => 'transaction_date',
            'filter_days' => 30, // show only transactions for last 30 days
            'filter_period' => 'week', // show only transactions for this week
        ];

        $chart_options = [
            'chart_title' => 'Reservations par Compagnies',
            'chart_type' => 'line',
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\Reservations',
        
            'relationship_name' => 'trajet', // represents function user() on Transaction model
            'group_by_field' => 'nom', // users.name
        
            'aggregate_function' => 'count',
            'aggregate_field' => 'reservations.trajet_id',
            
            'filter_field' => 'reservations.created_at',
            //'filter_days' => 30, // show only transactions for last 30 days
            //'filter_period' => 'week', // show only transactions for this week
        ];

        $chart_options = [
            'chart_title' => 'Reservations par Compagnies',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Reservations',
            'relationship_name' => 'trajet',
            'group_by_field' => 'nom',
            'chart_type' => 'pie',
            'filter_field' => 'created_at',
            //'filter_period' => 'month', // show users only registered this month
        ];
        $chart2 = new LaravelChart($chart_options);

        /*$chart_options = [
            'chart_title' => 'Transactions by dates',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Transaction',
            'group_by_field' => 'transaction_date',
            'group_by_period' => 'day',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',
            'chart_type' => 'line',
        ];
    
        $chart3 = new LaravelChart($chart_options);*/

        $chart_options = [
            'chart_title' => 'Montant des Reservations par dates',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Reservation',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'cout',
            'chart_type' => 'line',
        ];
    
        $chart3 = new LaravelChart($chart_options);

        return view('voirStatistique', compact('chart1','chart3'));
    }
}
