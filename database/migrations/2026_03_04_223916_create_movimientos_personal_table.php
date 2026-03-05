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
        Schema::create('movimientos_personal', function (Blueprint $table) {
            $table->id();

            // Datos generales
            $table->string('no')->nullable();
            $table->string('no_control')->nullable();
            $table->text('nombre')->nullable();
            $table->text('secretaria')->nullable();
            $table->text('tipo_movimiento')->nullable();
            $table->date('fecha')->nullable();

            // Datos anteriores
            $table->decimal('sueldo_anterior', 10, 2)->nullable();
            $table->text('puesto_anterior')->nullable();
            $table->text('departamento_anterior')->nullable();
            $table->text('direccion_anterior')->nullable();

            // Datos propuestos
            $table->decimal('sueldo', 10, 2)->nullable();
            $table->text('puesto_propuesto')->nullable();
            $table->text('departamento_propuesto')->nullable();
            $table->text('direccion_propuesta')->nullable();

            // Plaza
            $table->text('ocupa_plaza_de')->nullable();
            $table->string('no_control_plaza')->nullable();
            $table->text('remanente')->nullable();

            // Extras
            $table->text('observaciones')->nullable();
            $table->text('motivo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos_personal');
    }
};
