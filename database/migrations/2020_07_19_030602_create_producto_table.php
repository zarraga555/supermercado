<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
          $table->id();
          $table->string('nombre', 300);
          $table->string('descripcion', 300)->nullable();
          $table->bigInteger('stock');
          $table->double('precio');
          $table->foreignId('categoria_id')->nullable()->constrained('categorias')->onDelete('set null');
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
        Schema::dropIfExists('producto');
    }
}
