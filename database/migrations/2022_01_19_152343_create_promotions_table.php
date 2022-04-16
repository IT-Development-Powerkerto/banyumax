<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->foreignId('user_id');
            $table->string('promotion_type');
            $table->string('product_name');
            $table->string('promotion_name');
            $table->integer('promotion_product_price')->nullable();
            $table->integer('promotion_product_percent')->nullable();
            $table->integer('promotion_shippment_cost')->nullable();
            $table->integer('promotion_shippment_percent')->nullable();
            $table->integer('promotion_admin_cost')->nullable();
            $table->integer('promotion_admin_percent')->nullable();
            $table->integer('total_promotion');
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
        Schema::dropIfExists('promotions');
    }
}
