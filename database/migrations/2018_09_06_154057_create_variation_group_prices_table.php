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
        Schema::create('variation_group_prices', function (Blueprint $table) {
            // $table->increments('id');
            $table->id();
            
            // $table->integer('variation_id')->unsigned();
            // $table->foreign('variation_id')->references('id')->on('variations')->onDelete('cascade');
            $table->foreignId('variation_id')->unsigned()->constrained('business')->onDelete('cascade');

            // $table->integer('price_group_id')->unsigned();
            // $table->foreign('price_group_id')->references('id')->on('selling_price_groups')->onDelete('cascade');
            $table->foreignId('price_group_id')->unsigned()->constrained('selling_price_groups')->onDelete('cascade');

            $table->decimal('price_inc_tax', 22, 4);
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
        Schema::dropIfExists('variation_group_prices');
    }
};
