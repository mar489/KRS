<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->unsignedBigInteger('person_id')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->unsignedBigInteger('delivery_id')->nullable();
            $table->string('comments')->nullable();
            $table->integer('price');
            $table->boolean('delete')->default(0);
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('person')->onDelete('set null');
            $table->foreign('status_id')->references('id')->on('order_status')->onDelete('set null');
            $table->foreign('delivery_id')->references('id')->on('delivery')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
