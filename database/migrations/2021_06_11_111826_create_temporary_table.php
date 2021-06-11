<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary', function (Blueprint $table) {

            $table->datetime('day_temporary')->nullable();
            $table->bigInteger('total_sale_cash')->nullable();
            $table->bigInteger('total_sale_baucher')->nullable();
            $table->bigInteger('total_sales')->nullable();
            $table->bigInteger('total_expense_cash')->nullable();
            $table->bigInteger('total_expense_baucher')->nullable();
            $table->bigInteger('total_expenses')->nullable();
            $table->bigInteger('total_cash_day')->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temporary');
    }
}
