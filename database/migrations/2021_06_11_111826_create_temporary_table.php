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

            $table->datetime('day_temporary');
            $table->bigInteger('total_sale_cash');
            $table->bigInteger('total_sale_baucher');
            $table->bigInteger('total_sales');
            $table->bigInteger('total_expense_cash');
            $table->bigInteger('total_expense_baucher');
            $table->bigInteger('total_expenses');
            $table->bigInteger('total_cash_day');            
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
