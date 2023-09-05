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
            $table->id();
            $table->string('image', 1000);
            $table->string('name');
            $table->string('description');
            $table->double('price');
            $table->unsignedBigInteger('brands_id');
            $table->unsignedBigInteger('categories_id');
            $table->unsignedBigInteger('sub_categories_id');
            $table->unsignedBigInteger('sub_processes_id');
            $table->foreign('brands_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_categories_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('sub_processes_id')->references('id')->on('sub_processes')->onDelete('cascade');
            $table->string('manufacturer');
            $table->double('total_sales')->default(0);
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
