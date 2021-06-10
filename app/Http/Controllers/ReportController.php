<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Carbon\CarbonPeriod;
use DB;
use App\Models\Sale;
use App\Models\Expense;
use App\Models\User;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    

    public function store(Request $request)
    {
        //dd($request->all());
        $from = $request->get('date_ini');
        $to = $request->get('date_finish');
        $period = new CarbonPeriod($from, $to);


        DB::statement("DELETE from temporal");
        DB::statement("INSERT INTO temporal(day_temporal, total_sale_cash, total_sale_baucher) (SELECT day_sale_cash, total_sale_cash, total_sale_baucher FROM total_sales_view WHERE day_sale_cash BETWEEN '$from' AND '$to')");
        DB::statement("UPDATE temporal SET total_sales = (IFNULL(total_sale_cash,0)+ IFNULL(total_sale_baucher,0))");
        DB::statement("UPDATE temporal JOIN total_expenses_view ON temporal.day_temporal = total_expenses_view.day_expense_cash SET temporal.total_expense_cash = total_expenses_view.total_expense_cash");
        DB::statement("UPDATE temporal JOIN total_expenses_view ON temporal.day_temporal = total_expenses_view.day_expense_baucher SET temporal.total_expense_baucher = total_expenses_view.total_expense_baucher");
        DB::statement("UPDATE temporal SET total_expenses = (IFNULL(total_expense_cash,0)+ IFNULL(total_expense_baucher,0))");
        DB::statement("UPDATE temporal SET total_cash_day = (IFNULL(total_sales,0)+ IFNULL(total_expenses,0))");

        $total_sale_cash = DB::table('sales_cash_view')
        ->select('day_sale_cash', 'total_sale_cash')
        ->whereBetween('day_sale_cash', [$from, $to])
        ->get();

        $total_sale_baucher = DB::table('sales_baucher_view')
        ->select('day_sale_baucher', 'total_sale_baucher')
        ->whereBetween('day_sale_baucher', [$from, $to])
        ->get();


                                
        foreach($period as $day){
            foreach($total_sale_cash as $total){
                if ($total->day_sale_cash = $day){ 
                        $total1 = $total_sale_cash;
                };
            };
            foreach($total_sale_baucher as $total){
                if ($total->day_sale_baucher = $day){ 
                        $total2 = $total_sale_baucher;
                        
                };
            };
        };

        $total_cash = collect($total_sale_cash)->sum('total_sale_cash');
        $total_baucher = collect($total_sale_baucher)->sum('total_sale_baucher');
        $total_sales = $total_cash + $total_baucher;

        $pdf   = PDF::loadView('pdf.report', compact('period', 'total_sale_cash','total_sale_baucher', 'total_cash', 'total_baucher', 'total_sales'));
        return $pdf->stream('report.pdf');  

    }

    /**public function exportPdf($from, $to)
    {
        
        //$from = '2021-06-03 00:00:00';
        //$to =  '2021-06-08 00:00:00';
        $period = new CarbonPeriod($from, $to);

        $total_sale_cash = DB::table('sales_cash_view')
        ->select('day_sale_cash', 'total_sale_cash')
        ->whereBetween('day_sale_cash', [$from, $to])
        ->get();

        $total_sale_baucher = DB::table('sales_baucher_view')
        ->select('day_sale_baucher', 'total_sale_baucher')
        ->whereBetween('day_sale_baucher', [$from, $to])
        ->get();
                                
        foreach($period as $day){
            foreach($total_sale_cash as $total){
                if ($total->day_sale_cash = $day){ 
                        $total1 = $total_sale_cash;
                };
            };
            foreach($total_sale_baucher as $total){
                if ($total->day_sale_baucher = $day){ 
                        $total2 = $total_sale_baucher;
                        
                };
            };
        };

        $total_cash = collect($total_sale_cash)->sum('total_sale_cash');
        $total_baucher = collect($total_sale_baucher)->sum('total_sale_baucher');
        $total_sales = $total_cash + $total_baucher;

        $pdf   = PDF::loadView('pdf.report', compact('period', 'total_sale_cash','total_sale_baucher', 'total_cash', 'total_baucher', 'total_sales'));
        return $pdf->stream('report.pdf');
    }**/
}
