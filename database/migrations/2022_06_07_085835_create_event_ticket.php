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
        DB::unprepared("CREATE EVENT ticket_expire ON SCHEDULE EVERY 24 HOUR DO UPDATE tickets SET `status` ='Selesai' WHERE created_at <= DATE_ADD(CURRENT_DATE(), INTERVAL -30 DAY) AND `status`='closed';" );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_expire');
    }
};
