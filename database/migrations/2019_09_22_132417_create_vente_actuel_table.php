<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenteActuelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventes', function (Blueprint $table) {
            $table->bigIncrements('idA');
            $table->bigInteger('medicament_id')->unsigned();
            $table->foreign('medicament_id')->references('id')->on('medicaments');
            $table->bigInteger('lot_id')->unsigned();
            $table->foreign('lot_id')->references('id')->on('lots');
            $table->string('pharmacien');
            $table->integer('Quantite');
            $table->integer('isValide');
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
        Schema::dropIfExists('ventes', function (Blueprint $table) {
        $table->dropForeign(['medicament_id']);
        $table->dropColumn('medicament_id');
        $table->dropForeign(['lot_id']);
        $table->dropColumn('lot_id');
         
        });
    }
}
