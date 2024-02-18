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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('date_of_birth')->nullable();
            $table->string('city_of_birth')->nullable();
            $table->string('state_of_birth')->nullable();
            $table->string('contact_number');
            $table->string('cpf')->unique();
            $table->string('rg')->unique();
            $table->string('street');
            $table->string('number');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');
            $table->string('cep');
            $table->string('marital_status')->nullable();
            $table->string('occupation')->nullable();
            $table->enum('gender', ['masc', 'fem'])->nullable();
            $table->enum('level_of_education', [1, 2, 3, 4, 5])->nullable()->comment('verificar em https://www.ipea.gov.br/atlasestado/arquivos/rmd/4874-conjunto4v10.html');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('date_of_baptism')->nullable();
            $table->string('past_church')->nullable();
            $table->string('past_ministry')->nullable();
            $table->string('desire_ministry')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
