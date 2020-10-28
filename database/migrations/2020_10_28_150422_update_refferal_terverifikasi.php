<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRefferalTerverifikasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW referr_count_terverifikasi");   
        
        DB::statement("
            CREATE or REPLACE
                ALGORITHM = UNDEFINED
                SQL SECURITY DEFINER
            VIEW referr_count_terverifikasi AS
            SELECT
                users.ref_by as ref_by,
                count(users.ref_by) as jumlah,
                (
                    SELECT 
                        count(u.ref_by) as jumlah
                        FROM users u
                        WHERE u.ref_by IS NOT NULL
                        AND u.ref_by = users.ref_by
                        GROUP BY u.ref_by
                ) as jumlah_undangan
            FROM users
            WHERE users.ref_by IS NOT NULL
            AND users.status_pembayaran = 1
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
        DB::statement("DROP VIEW referr_count_terverifikasi");   
    }
}
