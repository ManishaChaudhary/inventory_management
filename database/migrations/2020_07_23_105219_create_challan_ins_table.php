<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallanInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challan_ins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('party')->nullable();
            $table->date('in_date')->nullable();
            $table->string('truck_no')->nullable();
            $table->string('weight')->nullable();
            $table->string('company_id');
            $table->string('godown_id');
            $table->longText('in_details');
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
        Schema::dropIfExists('challan_ins');
    }
}
