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
        Schema::create('product_variations', function (Blueprint $table) {
            // $table->increments('id');
            $table->id();
            $table->string('name');

            // $table->integer('product_id')->unsigned();
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('product_id')->unsigned()->constrained('products')->onDelete('cascade');

            $table->boolean('is_dummy')->default(1);
            $table->timestamps();

            //Indexing
            $table->index('name');
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_variations');
    }
};
