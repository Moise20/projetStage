<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrajetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trajets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('villeDepart');
            $table->string('villeArrivee');
            $table->string('heureDepart');
            $table->string('heureArrivee');
            $table->string('dateDepart');
            $table->string('tarif');
            $table->integer('nbrPlace');
            $table->integer('agence_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trajets');
    }
}
