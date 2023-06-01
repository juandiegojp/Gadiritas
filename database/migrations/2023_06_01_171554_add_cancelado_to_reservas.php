<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCanceladoToReservas extends Migration
{
    public function up()
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->boolean('cancelado')->default(false);
        });
    }

    public function down()
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->dropColumn('cancelado');
        });
    }
}
