<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJogadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogadores', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 70)->nullabe(false);
            $table->date('data_nascimento')->nullabe(false);
            $table->foreignId('clube_id')->references('id')->on('clubes')->onDelete('CASCADE');
            $table->foreignId('posicao_id')->references('id')->on('posicoes')->onDelete('RESTRICT');
            $table->boolean('possui_figurinha')->default(false)->nullabe(false);
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
        Schema::dropIfExists('jogadores');
    }
}
