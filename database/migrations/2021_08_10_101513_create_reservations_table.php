<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nbrPassager');
            $table->string('infoPassPrincip');
            $table->string('tel');
            $table->string('typeBillet');
            $table->string('cout');
            $table->string('identifiantTransaction')->nullable();
            $table->string('statutPaiement')->nullable();
            $table->string('tx_reference')->nullable();
            $table->integer('trajet_id');
            $table->integer('client_id');
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
        Schema::dropIfExists('reservations');
    }
}
