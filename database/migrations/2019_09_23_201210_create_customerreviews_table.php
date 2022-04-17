<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerreviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customerreviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('billing_id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->string('product_name');
            $table->longText('customer_comments');
            $table->integer('customer_rating');
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
        Schema::dropIfExists('customerreviews');
    }
}
