<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors_info', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_id');
            $table->longText('address')->nullable();
            $table->string('specialization')->nullable();
            $table->string('bachelor_degree')->nullable();
            $table->longText('treatment')->nullable();
            $table->longText('schedule')->nullable();
            $table->string('logo')->nullable();
            $table->string('online_check')->default('no');
            $table->string('online_chat')->default('no');
            $table->string('assistant_role')->default('no');
            $table->string('language')->default('arabic');
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
        Schema::dropIfExists('doctors_info');
    }
}
