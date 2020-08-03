<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_proveedor', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('producto_id')->unsigned()->nullable();
            $table->bigInteger('proveedor_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('producto')->onDelete('set null');
            $table->foreign('proveedor_id')->references('id')->on('proveedor')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_proveedor');
    }
}
