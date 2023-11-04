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
        Schema::create('categories', function (Blueprint $table) {
            // $table->increments('id');
            $table->id();
            $table->string('name');
            // $table->integer('business_id')->unsigned();
            // $table->foreign('business_id')->references('id')->on('business')->onDelete('cascade');
            $table->foreignId('business_id')->unsigned()->constrained('business')->onDelete('cascade');

            $table->string('short_code')->nullable();
            $table->integer('parent_id');

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
        Schema::dropIfExists('categories');
    }
};
