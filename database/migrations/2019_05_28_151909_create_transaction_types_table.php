<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTypesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('transaction_types')->insert([
            [
                'name'        => 'Captcha Encode',
                'description' => 'captcha action database identifier'
            ],
            [
                'name'        => 'Encashment',
                'description' => 'requesting an encashment from the generated income'
            ],
            [
                'name' => 'Referral Bonus',
                'description' => 'income generated after a successful user referral registration'
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
        Schema::dropIfExists('transaction_types');
    }
}
