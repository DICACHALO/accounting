<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Carbon;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function exportpdf(Request $request)
    {
        $from = $request->get('date_ini');
        $to = $request->get('date_finish');
        $mytime = Carbon\Carbon::now();
        $today = $mytime->toDateString();

        DB::statement("DELETE from temporary");
        DB::statement("INSERT INTO temporary(day_temporary, total_sale_cash, total_sale_baucher) (SELECT day_sale_cash, total_sale_cash, total_sale_baucher FROM total_sales_view WHERE day_sale_cash BETWEEN '$from' AND '$to')");
        
        DB::statement("UPDATE temporary SET total_sale_cash = 0 WHERE temporary.total_sale_cash IS NULL");

        DB::statement("UPDATE temporary SET total_sale_baucher = 0 WHERE temporary.total_sale_baucher IS NULL");

        DB::statement("UPDATE temporary SET total_sales = 0,  total_expense_cash=0, total_expense_baucher=0, total_expenses=0, total_cash_day=0");

        DB::statement("UPDATE temporary SET total_sales = total_sale_cash +total_sale_baucher");

        DB::statement("UPDATE temporary SET total_expense_cash = total_expenses_view.total_expense_cash FROM total_expenses_view WHERE temporary.day_temporary = total_expenses_view.day_expense_cash");

        DB::statement("UPDATE temporary SET total_expense_baucher = total_expenses_view.total_expense_baucher FROM total_expenses_view WHERE temporary.day_temporary = total_expenses_view.day_expense_baucher");

        DB::statement("UPDATE temporary SET total_expenses = total_expense_cash + total_expense_baucher");
        DB::statement("UPDATE temporary SET total_cash_day = total_sales +total_expenses");

        $temporary = DB::table('temporary')
        ->select('day_temporary', 'total_sale_cash', 'total_sale_baucher', 'total_sales', 'total_expense_cash', 'total_expense_baucher', 'total_expenses', 'total_cash_day')
        ->get();

        $total_sale_cash = DB::table('temporary')
        ->get()
        ->sum('total_sale_cash');

        $total_sale_baucher = DB::table('temporary')
        ->get()
        ->sum('total_sale_baucher');

        $total_sales = DB::table('temporary')
        ->get()
        ->sum('total_sales');

        $total_expense_cash = DB::table('temporary')
        ->get()
        ->sum('total_expense_cash');

        $total_expense_baucher = DB::table('temporary')
        ->get()
        ->sum('total_expense_baucher');

        $total_expenses = DB::table('temporary')
        ->get()
        ->sum('total_expenses');

        $total_cash_day = DB::table('temporary')
        ->get()
        ->sum('total_cash_day');



        $pdf = PDF::loadView('pdf.report', compact('temporary', 'today', 'total_sale_cash', 'total_sale_baucher', 'total_sales', 'total_expense_cash', 'total_expense_baucher', 'total_expenses', 'total_cash_day'));
        return $pdf
        ->setPaper('letter', 'landscape')
        ->stream('report.pdf');  

    }
}
