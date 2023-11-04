<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::statement("ALTER TABLE transactions MODIFY COLUMN type ENUM('purchase','sell', 'expense')");
        // DB::statement('ALTER TABLE transactions MODIFY COLUMN contact_id INT(11) UNSIGNED DEFAULT NULL');

        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign('transactions_contact_id_foreign');
            $table->dropColumn('contact_id');
        });

        Schema::table('transactions', function (Blueprint $table) {
            // $table->integer('contact_id')->unsigned()->nullable()->after('payment_status')->change();
            // $table->foreign('contact_id')->references('id')->on('contacts');
            $table->foreignId('contact_id')->unsigned()->nullable()->after('payment_status')->constrained('contacts')->onDelete('cascade');
            // $table->integer('expense_category_id')->nullable()->unsigned()->after('final_total');
            // $table->foreign('expense_category_id')->references('id')->on('expense_categories')->onDelete('cascade');
            $table->foreignId('expense_category_id')->unsigned()->nullable()->after('final_total')->constrained('expense_categories')->onDelete('cascade');

            // $table->integer('expense_for')->nullable()->unsigned()->after('expense_category_id');
            // $table->foreign('expense_for')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('expense_for')->unsigned()->nullable()->after('expense_category_id')->constrained('users')->onDelete('cascade');

            $table->index('expense_category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
        });
    }
};
