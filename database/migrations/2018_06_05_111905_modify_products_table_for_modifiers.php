<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE products MODIFY COLUMN type ENUM('single','variable', 'modifier')");
        // DB::statement('ALTER TABLE products MODIFY COLUMN unit_id INT(11) UNSIGNED DEFAULT NULL');
        
        // DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_unit_id_foreign');
            $table->dropColumn('unit_id');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('unit_id')->unsigned()->nullable()->after('type')->constrained('units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
