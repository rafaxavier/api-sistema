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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('email',50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('access_type', ['admin', 'professional', 'reception']);
            $table->unsignedBigInteger('salon_id');
            $table->rememberToken();
            $table->timestamps();

            // Adiciona a chave estrangeira para o relacionamento com a tabela salons
            $table->foreign('salon_id')->references('id')->on('salons')->onDelete('cascade');
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
            // Remove a chave estrangeira
            $table->dropForeign(['salon_id']);
        });
        
        Schema::dropIfExists('users');
    }
};
