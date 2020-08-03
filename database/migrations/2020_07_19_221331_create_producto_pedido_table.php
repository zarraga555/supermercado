<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_pedido', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('producto_id')->unsigned()->nullable();
            $table->bigInteger('pedido_id')->unsigned()->nullable();
            $table->bigInteger('cantidad');
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('producto')->onDelete('set null');
            $table->foreign('pedido_id')->references('id')->on('pedido')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_pedido');
    }
}
