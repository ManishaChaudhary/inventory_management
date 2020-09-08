<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallanOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challan_outs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('party');
            $table->date('out_date');
            $table->string('vehicle_no');
            $table->unsignedInteger('company_id');
            $table->longText('out_details');
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
        Schema::dropIfExists('challan_outs');
    }
}
