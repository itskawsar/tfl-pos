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
        Schema::table('business_locations', function (Blueprint $table) {
            // $table->integer('invoice_scheme_id')->unsigned()->after('zip_code');
            // $table->foreign('invoice_scheme_id')->references('id')->on('invoice_schemes')->onDelete('cascade');
            $table->foreignId('invoice_scheme_id')->unsigned()->after('zip_code')->constrained('invoice_schemes')->onDelete('cascade');

            // $table->integer('invoice_layout_id')->unsigned()->after('invoice_scheme_id');
            // $table->foreign('invoice_layout_id')->references('id')->on('invoice_layouts')->onDelete('cascade');
            $table->foreignId('invoice_layout_id')->unsigned()->after('invoice_scheme_id')->constrained('invoice_layouts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_locations', function (Blueprint $table) {
            //
        });
    }
};
