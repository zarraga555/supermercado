<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ci')->unique();
            $table->string('complemento', 5)->nullable();
            $table->string('nombre', 255);
            $table->string('apellido', 255);
            $table->bigInteger('telefono');
            $table->string('correo');
            $table->string('direccion');
            $table->string('sexo');
            $table->double('salario');
            $table->string('file')->nullable();
            $table->foreignId('cargo_id')->nullable()->constrained('cargo')->onDelete('set null');
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
        Schema::dropIfExists('empleado');
    }
}
