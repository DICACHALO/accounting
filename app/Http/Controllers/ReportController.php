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

        DB::statement("DELETE from temporal");
        DB::statement("INSERT INTO temporal(day_temporal, total_sale_cash, total_sale_baucher) (SELECT day_sale_cash, total_sale_cash, total_sale_baucher FROM total_sales_view WHERE day_sale_cash BETWEEN '$from' AND '$to')");
        DB::statement("UPDATE temporal SET total_sales = (IFNULL(total_sale_cash,0)+ IFNULL(total_sale_baucher,0))");
        DB::statement("UPDATE temporal JOIN total_expenses_view ON temporal.day_temporal = total_expenses_view.day_expense_cash SET temporal.total_expense_cash = total_expenses_view.total_expense_cash");
        DB::statement("UPDATE temporal JOIN total_expenses_view ON temporal.day_temporal = total_expenses_view.day_expense_baucher SET temporal.total_expense_baucher = total_expenses_view.total_expense_baucher");
        DB::statement("UPDATE temporal SET total_expenses = (IFNULL(total_expense_cash,0)+ IFNULL(total_expense_baucher,0))");
        DB::statement("UPDATE temporal SET total_cash_day = (IFNULL(total_sales,0)+ IFNULL(total_expenses,0))");

        $temporal = DB::table('temporal')
        ->select('day_temporal', 'total_sale_cash', 'total_sale_baucher', 'total_sales', 'total_expense_cash', 'total_expense_baucher', 'total_expenses', 'total_cash_day')
        ->get();

        $pdf = PDF::loadView('pdf.report', compact('temporal', 'today'));
        return $pdf
        ->setPaper('letter', 'landscape')
        ->stream('report.pdf');  

    }
}
