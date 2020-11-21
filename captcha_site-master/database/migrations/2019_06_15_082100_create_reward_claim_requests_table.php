<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewardClaimRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reward_claim_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_id');
            $table->integer('reward_id');
            $table->text('delivery_address');
            $table->string('mobile_number');
            $table->text('notes')->nullable();
            $table->integer('payment_option')->default(0);
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
        Schema::dropIfExists('reward_claim_requests');
    }
}
