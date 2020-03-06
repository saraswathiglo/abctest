<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblpanchayteeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpanchaytee', function (Blueprint $table) {
            $table->increments('PanchayteeId');
            $table->integer('DistrictId');
            $table->integer('TalukaId');
            $table->string('PanchayteeName');
            $table->tinyInteger('Status')->default(1);
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
        Schema::dropIfExists('tblpanchaytee');
    }
}
