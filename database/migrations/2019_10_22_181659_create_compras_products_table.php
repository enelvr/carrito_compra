<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('compras_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            $table->foreign('compras_id')->references('id')->on('compras');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras_products');
    }
}
