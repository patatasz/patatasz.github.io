<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionStatusesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('transaction_statuses')->insert([
            [
                'name'        => 'pending',
                'description' => 'transaction is still on processing'
            ],
            [
                'name'        => 'rejected',
                'description' => 'transaction is rejected'
            ],
            [
                'name'        => 'completed',
                'description' => 'transaction is completed'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_statuses');
    }
}
