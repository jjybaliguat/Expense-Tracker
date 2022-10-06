<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('TransactionType');
            $table->mediumText('Description')->nullable();
            $table->BigInteger('Amount');
            $table->unsignedBigInteger('UserId');
            $table->foreign('UserId')->references('id')->on('users')->onDelete('cascade');
            $table->datetime();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
