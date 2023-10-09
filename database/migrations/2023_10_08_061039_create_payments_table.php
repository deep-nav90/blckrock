<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('order_id')->nullable();
            $table->string('transaction_id');
            $table->string('payment_type');
            $table->string('coupon_code')->nullable();
            $table->double('coupon_amount_and_percentage')->default(0);
            $table->enum('coupon_type',['None','Percentage','Flat'])->default('None');
            $table->double('discount_amount_for_coupon')->default(0);
            $table->double('shipping_charger')->default(0);
            $table->double('total_amount')->default(0);
            $table->double('pay_amount')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('payments');
    }
}
