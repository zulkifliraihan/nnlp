<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewCountReferal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE or REPLACE
                ALGORITHM = UNDEFINED
                SQL SECURITY DEFINER
            VIEW referr_count AS
            SELECT
                users.ref_by as ref_by,
                count(users.ref_by) as jumlah,
                users.status_pembayaran
            FROM users
            WHERE users.ref_by IS NOT NULL
            GROUP BY users.ref_by
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW referr_count");   
    }
}
