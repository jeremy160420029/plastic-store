<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('sub_categories_id');
            $table->unsignedBigInteger('sub_processes_id');
            $table->foreign('sub_categories_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('sub_processes_id')->references('id')->on('sub_processes')->onDelete('cascade');
            $table->primary(['sub_categories_id']);
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
        Schema::dropIfExists('product_categories');
    }
}
