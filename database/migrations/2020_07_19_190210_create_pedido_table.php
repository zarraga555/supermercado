<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->foreignId('metodo_pago_id')->nullable()->constrained('metodo_pago')->onDelete('set null');
            $table->foreignId('cliente_id')->nullable()->constrained('cliente')->onDelete('set null');
            $table->foreignId('usuario_id')->nullable()->constrained('users')->onDelete('set null');
            //$table->bigInteger('metodo_pago_id')->unsigned()->nullable();
            // $table->bigInteger('cliente_id')->unsigned()->nullable();
            // $table->bigInteger('usuario_id')->unsigned()->nullable();
            $table->double('total');
            $table->timestamps();


            // $table->foreign('cliente_id')->references('id')->on('cliente');
            // $table->foreign('usuario_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido');
    }
}
