<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->foreignId('campaign_id');
            // $table->foreignId('product_id');
            $table->string('name')->nullable();
            $table->string('whatsapp')->nullable();
            // $table->integer('quantity')->nullable();
            // $table->integer('total_price')->nullable();
            // $table->foreignId('status_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
