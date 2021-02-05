<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_id');
            $table->string('patient_id');
            $table->string('price')->nullable();
            $table->string('discount')->default(0);
            $table->string('final_price')->nullable();
            $table->string('examination_type')->nullable();
            $table->string('register_with')->default('offline');
            $table->date('examination_date')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examinations');
    }
}
