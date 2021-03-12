<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductTable extends Migration
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
            $table->integer('category_id');
            $table->string('product_code', 10);
            $table->string('product_name', 150);
            $table->integer('product_stock')->default(0);
            $table->text('product_desc');
            $table->decimal('price',12,2);
			$table->enum('status', [0, 1])->comment('0 out of stock/unavaibale | 1 available')->default(1);
			$table->dateTime('deleted_at')->nullable();
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
