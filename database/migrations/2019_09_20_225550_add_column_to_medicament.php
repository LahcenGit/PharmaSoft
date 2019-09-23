<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToMedicament extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicaments', function (Blueprint $table) {
            $table->string('remboursable')->after('Qte');
             $table->string('disponibe')->after('remboursable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicaments', function (Blueprint $table) {
            $table->dropColumn('remboursable');
            $table->dropColumn('disponibe');
        });
    }
}
