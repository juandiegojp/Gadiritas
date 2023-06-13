<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToActividadsTable extends Migration
{
    public function up()
    {
        Schema::table('actividads', function (Blueprint $table) {
            $table->boolean('activo')->default(true);
            $table->time('horas')->nullable();
        });
    }

    public function down()
    {
        Schema::table('actividads', function (Blueprint $table) {
            $table->dropColumn('activo');
            $table->dropColumn('horas');
        });
    }
}

