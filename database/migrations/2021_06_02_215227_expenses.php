<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Expenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('expenses', function(Blueprint $table){
        $table->id();
        $table->dateTime('date_expense');
        $table->string('invoice');
        $table->string('merchandise_supplier');
        $table->bigInteger('price_expense');
        $table->string('type_expense');
        $table->string('receipt_number');
        $table->text('description_expense')->nullable();
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
        Schema::dropIfExists('expenses');
    }
}
