<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTocurrentTime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table){
            $table->datetime('created_at')->current_timestamp()->change();
            $table->datetime('updated_at')->current_timestamp()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table){
            $table->timestamp('created_at')->change();
            $table->timestamp('updated_at')->change();
        });
    }
}
