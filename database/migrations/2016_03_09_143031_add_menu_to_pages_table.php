<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMenuToPagesTable extends Migration
{
    public function up()
    {
        Schema::table('pages', function ($table) {
            $table->integer('menu')->default(1);
        });
    }

    public function down()
    {
        Schema::table('pages', function ($table) {
            $table->dropColumn('menu');
        });
    }
}
