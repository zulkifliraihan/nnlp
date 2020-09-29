<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserDataToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('hp')->nullable()->after("email");
            $table->string('instansi')->nullable()->after("hp");
            $table->string('ref')->nullable()->after("instansi");
            $table->string('ref_by')->nullable()->after("ref");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('hp');
            $table->dropColumn('instansi');
            $table->dropColumn('ref');
            $table->dropColumn('ref_by');
        });
    }
}
