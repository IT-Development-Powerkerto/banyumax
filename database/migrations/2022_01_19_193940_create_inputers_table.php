<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputers', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id')->nullable();
            $table->foreignId('lead_id')->nullable();
            $table->foreignId('adv_id')->constrained('users');
            $table->string('adv_name')->nullable();
            $table->foreignId('cs_id')->constrained('users');
            $table->string('operator_name')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_number')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('sale_type')->nullable();
            $table->string('product_name')->nullable();
            $table->integer('product_price')->nullable();
            $table->integer('product_weight')->nullable();
            $table->integer('quantity')->nullable();
            $table->foreignId('product_promotion_id')->constrained('promotions')->nullable();
            $table->integer('product_promotion')->nullable();
            $table->foreignId('add_product_promotion_id')->constrained('promotions')->nullable();
            $table->integer('add_product_promotion')->nullable();
            $table->integer('total_price')->nullable();
            $table->string('warehouse')->nullable();
            $table->integer('province_id')->nullable();
            $table->string('province')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('city')->nullable();
            $table->integer('subdistrict_id')->nullable();
            $table->string('subdistrict')->nullable();
            $table->string('courier')->nullable();
            $table->integer('shipping_price')->nullable();
            $table->foreignId('shipping_promotion_id')->constrained('promotions')->nullable();
            $table->integer('shipping_promotion')->nullable();
            $table->foreignId('add_shipping_promotion_id')->constrained('promotions')->nullable();
            $table->integer('add_shipping_promotion')->nullable();
            $table->integer('total_shipping')->nullable();
            $table->integer('shipping_admin')->nullable();
            $table->foreignId('admin_promotion_id')->constrained('promotions')->nullable();
            $table->integer('admin_promotion')->nullable();
            $table->foreignId('add_admin_promotion_id')->constrained('promotions')->nullable();
            $table->integer('add_admin_promotion')->nullable();
            $table->integer('total_admin')->nullable();
            $table->string('payment_method')->nullable();
            $table->integer('total_payment')->nullable();
            $table->string('payment_proof')->nullable();
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
        Schema::dropIfExists('inputers');
    }
}
