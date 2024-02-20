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
        Schema::table('salons', function (Blueprint $table) {
            $table->string('cnpj',18)->unique()->nullable()->after('name');
            $table->string('cpf',14)->unique()->nullable()->after('cnpj');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salons', function (Blueprint $table) {
            $table->dropColumn(['cnpj','cpf']);
        });
    }
};
