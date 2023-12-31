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
        // DB::statement('ALTER TABLE transaction_payments MODIFY COLUMN transaction_id INT(11) UNSIGNED DEFAULT NULL');

        Schema::table('transaction_payments', function (Blueprint $table) {
            $table->dropForeign('transaction_payments_transaction_id_foreign');
            $table->dropColumn('transaction_id');
        });

        Schema::table('transaction_payments', function (Blueprint $table) {
            $table->foreignId('transaction_id')->unsigned()->nullable()->after('id')->constrained('transactions')->onDelete('cascade');

            $table->integer('payment_for')->after('created_by')->nullable()->comment('stores the contact id');
            $table->integer('parent_id')->after('payment_for')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaction_payments', function (Blueprint $table) {
            //
        });
    }
};
