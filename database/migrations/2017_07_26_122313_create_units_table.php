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
        Schema::create('units', function (Blueprint $table) {
            // $table->increments('id');
            $table->id();
            // $table->integer('business_id')->unsigned();
            // $table->foreign('business_id')->references('id')->on('business')->onDelete('cascade');
            $table->foreignId('business_id')->unsigned()->constrained('business')->onDelete('cascade');

            $table->string('actual_name');
            $table->string('short_name');
            $table->boolean('allow_decimal');

            // $table->integer('created_by')->unsigned();
            // $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('created_by')->unsigned()->constrained('users')->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('units');
    }
};
