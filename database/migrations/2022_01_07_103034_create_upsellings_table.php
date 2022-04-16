<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpsellingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upsellings', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->foreignId('user_id');
            $table->foreignId('product_id');
            $table->double('upselling')->nullable();
            $table->double('upselling_point')->nullable();
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
        Schema::dropIfExists('upsellings');
    }
}
