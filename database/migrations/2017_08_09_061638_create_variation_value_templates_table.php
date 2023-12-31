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
        Schema::create('variation_value_templates', function (Blueprint $table) {
            // $table->increments('id');
            $table->id();
            $table->string('name');

            // $table->integer('variation_template_id')->unsigned();
            // $table->foreign('variation_template_id')->references('id')->on('variation_templates')->onDelete('cascade');
            $table->foreignId('variation_template_id')->unsigned()->constrained('variation_templates')->onDelete('cascade');

            $table->timestamps();

            //Indexing
            $table->index('name');
            $table->index('variation_template_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variation_value_templates');
    }
};
