<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW sales_cash_view (day_sale_cash, total_sale_cash) AS SELECT date_sale, SUM(price_sale) FROM sales WHERE type_sale='Efectivo' GROUP BY date_sale");
        DB::statement("CREATE VIEW sales_baucher_view (day_sale_baucher, total_sale_baucher) AS SELECT date_sale, SUM(price_sale) FROM sales WHERE type_sale='Baucher' GROUP BY date_sale");
        DB::statement("CREATE VIEW expenses_cash_view (day_expense_cash, total_expense_cash) AS SELECT date_expense, SUM(price_expense) FROM expenses WHERE type_expense='Efectivo' GROUP BY date_expense");
        DB::statement("CREATE VIEW expenses_baucher_view (day_expense_baucher, total_expense_baucher) AS SELECT date_expense, SUM(price_expense) FROM expenses WHERE type_expense='Consignación' GROUP BY date_expense");

        DB::statement("CREATE VIEW total_sales_view (day_sale_cash, total_sale_cash, day_sale_baucher, total_sale_baucher) AS SELECT * FROM sales_cash_view LEFT JOIN sales_baucher_view ON sales_cash_view.day_sale_cash = sales_baucher_view.day_sale_baucher UNION SELECT * FROM sales_cash_view  RIGHT JOIN sales_baucher_view ON sales_cash_view.day_sale_cash = sales_baucher_view.day_sale_baucher");

        DB::statement("CREATE VIEW total_expenses_view (day_expense_cash, total_expense_cash, day_expense_baucher, total_expense_baucher) AS SELECT * FROM expenses_cash_view LEFT JOIN expenses_baucher_view ON expenses_cash_view.day_expense_cash = expenses_baucher_view.day_expense_baucher UNION SELECT * FROM expenses_cash_view  RIGHT JOIN expenses_baucher_view ON expenses_cash_view.day_expense_cash = expenses_baucher_view.day_expense_baucher");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_cash_view');
        Schema::dropIfExists('sales_baucher_view');
        Schema::dropIfExists('expenses_cash_view');
        Schema::dropIfExists('expenses_baucher_view');
        Schema::dropIfExists('total_sales_view');
        Schema::dropIfExists('total_expenses_view');
    }
}
