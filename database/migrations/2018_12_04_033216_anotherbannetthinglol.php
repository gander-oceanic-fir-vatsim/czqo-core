<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Anotherbannetthinglol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('core_info', function($table) {
            $table->text('bannerMode');
            $table->text('bannerLink');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('core_info', function($table) {
            $table->dropColumn('bannerMode');
            $table->dropColumn('bannerLink');
        });
    }
}
