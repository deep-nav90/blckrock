<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('role_type',['Employee','Staff']);
            $table->string('email');
            $table->string('password');
            $table->text('otp_sent_on_email')->nullable();
            $table->dateTime('email_sent_at')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->integer('is_email_verified')->default(0);
            $table->text('reset_password_token')->nullable();
            $table->dateTime('reset_password_mail_sent_at')->nullable();
            $table->string('ip_address')->nullable();
            $table->rememberToken();
            $table->enum('login_with',['Normal','Facebook','Google','Apple'])->nullable();
            $table->string('user_locked')->nullable();
            $table->dateTime('user_locked_at')->nullable();
            $table->integer('wrong_attampt')->default(0);
            $table->dateTime('last_login_at')->nullable();
            $table->string('job_alert')->nullable();
            $table->integer('is_online')->default(0);
            $table->dateTime('last_update_date_time_online')->nullable();
            $table->string('location')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('is_block')->default(0);
            $table->enum('language_selected',['English','German','French','Spain'])->default('English');
            $table->string('self_reference_code')->nullable();
            $table->string('use_reference_code')->nullable();
            $table->integer('status_reference_code_used')->default(0);
            $table->longText('refresh_token')->nullable();
            $table->enum('device_type',['Android','Ios'])->nullable();
            $table->longText('device_token')->nullable();
            $table->string('stripe_id')->nullable();
            $table->string('stripe_account_id')->nullable();
            $table->string('stripe_account_bank_attach')->default(0);
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->dateTime('trial_ends_at')->nullable();
            $table->integer('is_biometric')->default(0);
            $table->dateTime('last_time_update_location')->nullable();
            $table->integer('is_enable_location')->default(0);
            $table->integer('last_active_at')->nullable();
            $table->integer('otp_verification_is_restricted')->default(0);
            $table->integer('count_invalid_otp')->default(0);
            $table->integer('is_premium')->default(0);
            $table->integer('is_verified_member')->default(0);
            $table->integer('identity_verify_status')->default(0);
            $table->string('identity_id')->nullable();
            $table->integer('business_verification_status')->default(0);
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
        Schema::dropIfExists('users');
    }
}
