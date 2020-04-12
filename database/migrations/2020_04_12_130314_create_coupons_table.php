<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable()->comment('Name of the Coupon   ');
            $table->string('link')->nullable()->comment('url to the coupon page');
            $table->integer('amount')->nullable()->comment('Coupon  Value');
            $table->string('code')->unique()->comment('unique code for each Coupon ');
            $table->enum('type', ['plain', 'unique'])->default('plain')->comment('plain means simple!');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->on('brands')->references('id')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('coupons');
    }
}
