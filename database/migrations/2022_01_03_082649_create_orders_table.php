<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('product_id');
            $table->integer('invoice');
            $table->text('country');
            $table->text('city');
            $table->text('address');
            $table->string('zipcode');
            $table->string('phone');
            $table->text('message')->nullable();
            $table->string('status')->default('not yet paid');
            $table->string('transaction_image')->nullable();
            $table->timestamp('transaction_date')->nullable();
            $table->string('delivery_image')->nullable();
            $table->timestamp('delivery_date')->nullable();
            $table->timestamp('estimated_date')->nullable();
            $table->string('arrival_image')->nullable();
            $table->timestamp('arrival_date')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
