<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('men', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('city');
            $table->integer('age');
            $table->string('number');
            $table->enum('status' , \App\Man::STATUSES)->default(\App\Man::STATUS_INACTIVE);

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
        Schema::dropIfExists('men');
    }
}
