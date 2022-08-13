<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('customer');
            $table->string('email');
            $table->string('phone');
            $table->enum('visited_before', ['yes', 'no']);
            $table->string('service');
            $table->string('appointDate');
            $table->longText('message')->nullable();
            $table->enum('status', ['not-visited', 'visited'])->default('not-visited');
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
        Schema::dropIfExists('appointments');
    }
}
