<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcceptPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accept_payments', function (Blueprint $table) {
            $table->id();
            $table->string('p_id');
            $table->string('bill_link');
            $table->string('bill_title');
            $table->string('sender_name');
            $table->string('sender_bank');
            $table->integer('amount');
            $table->string('status');
            $table->string('sender_bank_type');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accept_payments');
    }
}
