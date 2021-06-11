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
        DB::statement("UPDATE temporary SET total_sales = (IFNULL(total_sale_cash,0)+ IFNULL(total_sale_baucher,0))");
        DB::statement("UPDATE temporary JOIN total_expenses_view ON temporary.day_temporary = total_expenses_view.day_expense_cash SET temporary.total_expense_cash = total_expenses_view.total_expense_cash");
        DB::statement("UPDATE temporary JOIN total_expenses_view ON temporary.day_temporary = total_expenses_view.day_expense_baucher SET temporary.total_expense_baucher = total_expenses_view.total_expense_baucher");
        DB::statement("UPDATE temporary SET total_expenses = (IFNULL(total_expense_cash,0)+ IFNULL(total_expense_baucher,0))");
        DB::statement("UPDATE temporary SET total_cash_day = (IFNULL(total_sales,0)+ IFNULL(total_expenses,0))");

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
