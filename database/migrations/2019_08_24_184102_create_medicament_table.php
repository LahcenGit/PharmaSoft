<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicaments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('forme');
            $table->string('dosage');
            $table->string('dosageunit');
            $table->string('classTerapeutique');
            $table->integer('Qte');
            $table->integer('nbrLots');
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
        
        
        Schema::dropIfExists('medicaments');   
        
    }
}
