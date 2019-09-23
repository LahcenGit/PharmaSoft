<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDosageunitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosageunits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('medicamentforme_id')->unsigned();
            $table->foreign('medicamentforme_id')->references('id')->on('medicamentFormes');
            $table->string('dosageUnit');

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
        Schema::dropIfExists('dosageunits', function (Blueprint $table) {
        $table->dropForeign(['medicamentforme_id']);
        $table->dropColumn('medicamentforme_id');
        });

    }
}


 