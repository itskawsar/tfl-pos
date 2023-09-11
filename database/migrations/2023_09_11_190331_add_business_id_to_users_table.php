<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->integer('business_id')->unsigned()->nullable()->after('remember_token');
            // $table->foreign('business_id')->references('id')->on('business')->onDelete('cascade');
            $table->foreignId('business_id')->nullable()->after('remember_token')->constrained('business')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            //
        });
    }
};
