<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicamentHistoriqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamenthistoriques', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->bigInteger('medicament_id')->unsigned();
            $table->foreign('medicament_id')->references('id')->on('medicaments');
            
            $table->date('date');           
            $table->time('heure');
            $table->string('numLot');           
            $table->string('operation');

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
        Schema::dropIfExists('medicamenthistoriques', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');

        $table->dropForeign(['medicament_id']);
        $table->dropColumn('medicament_id');
       
        
        });
    }
}
