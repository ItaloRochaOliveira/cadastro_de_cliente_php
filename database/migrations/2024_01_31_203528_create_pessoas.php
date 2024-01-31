<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_telefone')->unsigned();
            $table->string("nome");
            $table->string("cpf")->unique();
            $table->string("rg")->unique();
            $table->string("cep")->unique();
            $table->string("logradouro");
            $table->string("complemento");
            $table->string("setor");
            $table->string("cidade");
            $table->string("uf");
            $table->date("created_at");
            $table->date("update_at");
            $table->foreign("id_telefone")->references("id")->on("telefones");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas');
    }
};