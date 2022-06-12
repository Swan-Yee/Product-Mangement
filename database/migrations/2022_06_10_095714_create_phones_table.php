<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string('model_name');
            $table->string('model_number');
            $table->string('description');
            $table->string('image');
            $table->foreignId('os_id')->references('id')->on('operation_systems')->nullable()->constrained();
            $table->foreignId('processor_id')->nullable()->constrained();
            $table->foreignId('brand_id')->nullable()->constrained();
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
        Schema::dropIfExists('phones');
    }
};
