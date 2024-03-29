<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('image')->default('default.png');
            $table->double('purchase_price', 8, 2)->default(0);
            $table->double('sale_price', 8, 2)->default(0);
            $table->double('sale_goml', 8, 2)->default(0);
            $table->double('sale_havegoml', 8, 2)->default(0);
            $table->double('first_stock', 8, 2)->default(0);
            $table->double('req_stock', 8, 2)->default(0);
            $table->string('store_place')->default('.');

            $table->double('stock', 8, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->userstamps();
            $table->softUserstamps();

         //  $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
