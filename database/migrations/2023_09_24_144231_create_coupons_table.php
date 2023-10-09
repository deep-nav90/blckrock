<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments("id");
            $table->string('coupon_name');
            $table->enum('coupon_type',['Flat','Percentage']);
            $table->double('coupon_amount_and_percentage')->default(0);
            $table->string('meta_keyword')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->text('meta_description')->nullable();
            $table->enum('status',['Active','Inactive'])->default('Active');
            $table->string('coupon_code')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
