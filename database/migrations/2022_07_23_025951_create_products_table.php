<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->integer('id_category');
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_content')->nullable();
            $table->float('product_price')->default(0);
            $table->float('product_vat')->default(0);
            $table->float('product_tradiscount')->default(0);
            $table->float('product_price_fake')->default(0); //
            $table->float('product_price_part')->default(0); // part thưởng cho nhân viên
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
        Schema::dropIfExists('products');
    }
}
