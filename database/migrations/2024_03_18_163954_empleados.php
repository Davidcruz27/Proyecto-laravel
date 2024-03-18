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
        Schema::create('empleados', function(Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fecha_nacimiento');
            $table->enum('genero', ['Masculino', 'Femenino', 'Otro']);
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email');
            $table->string('departamento');
            $table->string('cargo');
            $table->string('fecha_contratacion');
            $table->string('salario_base', 10, 2);
            $table->timestamps();//create_at updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
