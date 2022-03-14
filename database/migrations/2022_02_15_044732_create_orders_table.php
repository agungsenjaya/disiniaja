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
            $table->integer('package_id');
            $table->string('code');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->integer('frame_id')->nullable();
            $table->integer('cetak_id')->nullable();
            $table->bigInteger('frame_qty')->nullable();
            $table->bigInteger('cetak_qty')->nullable();
            $table->integer('promo_id')->nullable();
            $table->string('price_frame')->nullable();
            $table->string('time')->nullable();
            $table->string('total');
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
