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
        Schema::create('salons', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('description',200)->nullable();
            $table->string('phone',14)->nullable();
            $table->string('street',50)->nullable();
            $table->string('number',10)->nullable();
            $table->string('district',40)->nullable();
            $table->string('city',40)->nullable();
            $table->string('state', 2)->nullable(); 
            $table->string('zip_code',10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salons');
    }
};
