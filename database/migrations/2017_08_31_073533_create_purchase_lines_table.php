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
        Schema::create('purchase_lines', function (Blueprint $table) {
            // $table->increments('id');
            $table->id();

            // $table->integer('transaction_id')->unsigned();
            // $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->foreignId('transaction_id')->unsigned()->constrained('transactions')->onDelete('cascade');

            // $table->integer('product_id')->unsigned();
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('product_id')->unsigned()->constrained('products')->onDelete('cascade');

            // $table->integer('variation_id')->unsigned();
            // $table->foreign('variation_id')->references('id')->on('variations')->onDelete('cascade');
            $table->foreignId('variation_id')->unsigned()->constrained('variations')->onDelete('cascade');

            $table->decimal('quantity', 22, 4);
            $table->decimal('purchase_price', 22, 4);
            $table->decimal('purchase_price_inc_tax', 22, 4)->default(0);
            $table->decimal('item_tax', 22, 4)->comment('Tax for one quantity');

            // $table->integer('tax_id')->unsigned()->nullable();
            // $table->foreign('tax_id')->references('id')->on('tax_rates')->onDelete('cascade');
            $table->foreignId('tax_id')->unsigned()->constrained('tax_rates')->onDelete('cascade');

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
        Schema::dropIfExists('purchase_lines');
    }
};
