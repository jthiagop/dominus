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
        Schema::create('lancamentopadraos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('organismo_id');
            $table->unsignedBigInteger('tenant_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('matriz_id')->nullable();

            $table->string('nome');
            $table->string('tipo');
            $table->string('descricao');

            $table->foreign('organismo_id')
                    ->references('id')
                    ->on('organismos');

            $table->foreign('tenant_id')
                    ->references('id')
                    ->on('tenants')
                    ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lancamentopadraos');
    }
};
