<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inventario_stock')->nullable();
            $table->integer('suap_stock')->nullable();
            $table->timestamp('data_inventario')->nullable();
            $table->timestamp('data_suap')->nullable();
            $table->integer('current_stock')->nullable();
            $table->integer('current_suap_stock')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }
}