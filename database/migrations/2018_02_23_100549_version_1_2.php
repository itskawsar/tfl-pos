<?php

use Carbon\Carbon;
use Spatie\Permission\Models\Permission;
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
        $now = Carbon::now()->toDateTimeString();
        // Permission::insert([
        //     [
        //         'name' => 'profit_loss_report.view',
        //         'guard_name' => 'web',
        //         'created_at' => $now,
        //     ],
        //     [
        //         'name' => 'direct_sell.access',
        //         'guard_name' => 'web',
        //         'created_at' => $now,
        //     ],
        // ]);
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
