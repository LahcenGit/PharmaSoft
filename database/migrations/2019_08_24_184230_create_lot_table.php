<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lots', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('numero');
            $table->bigInteger('medicament_id')->unsigned();
            $table->foreign('medicament_id')->references('id')->on('medicaments');
            $table->date('dateF');
            $table->date('dateP');
            $table->integer('prixAchat');
            $table->integer('prixVente');
            $table->integer('Qte');
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
        
       
        Schema::dropIfExists('lots', function (Blueprint $table) {
             $table->dropForeign(['medicament_id']);
        $table->dropColumn('medicament_id');
        });
    }
}
