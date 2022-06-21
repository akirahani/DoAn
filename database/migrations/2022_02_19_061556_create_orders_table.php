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
            $table->string('name');
            $table->string('tel');
            $table->string('address');
            $table->string('receive');
            $table->string('note');
            $table->string('mail');
            $table->bigInteger('status');
            $table->bigInteger('total_price'); 
            $table->bigInteger('lydohuy');
            $table->datetime('giohoanthanh'); 
            $table->datetime('giovanchuyen');
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
