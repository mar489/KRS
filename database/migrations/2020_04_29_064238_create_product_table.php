<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('characteristics_id')->nullable();
            $table->unsignedBigInteger('img_id')->nullable();
            $table->string('code');
            $table->string('product_name');
            $table->integer('price');
            $table->boolean('is_available');
            $table->string('color');
            $table->string('status')->default(0);
            $table->text('description');
            $table->boolean('delete')->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category')->onDelete('set null');
            $table->foreign('characteristics_id')->references('id')->on('characteristics')->onDelete('set null');
            $table->foreign('img_id')->references('id')->on('img')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
