<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncashmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encashments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_id');
            $table->string('amount');
            $table->integer('status')->default(0);
            $table->string('payment_option');
            $table->text('full_name')->nullable();
            $table->text('address')->nullable();
            $table->text('mobile_number')->nullable();
            $table->text('coinsph_wallet_address')->nullable();
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
        Schema::dropIfExists('encashments');
    }
}
