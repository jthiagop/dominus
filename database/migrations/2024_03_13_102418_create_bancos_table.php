<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bancos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('organismo_id');
            $table->unsignedBigInteger('tenant_id');
            $table->unsignedBigInteger('user_id');

            $table->string('nome');
            $table->string('agencia');
            $table->string('numero');
            $table->string('digito');
            $table->string('tipo');

            $table->foreign('organismo_id')
                    ->references('id')
                    ->on('organismos')
                    ->onDelete('cascade');

                    $table->foreign('tenant_id')
                    ->references('id')
                    ->on('tenants')
                    ->onDelete('cascade');

                    $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->timestamps();

                });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bancos');
    }
};
