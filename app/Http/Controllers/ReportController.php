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
    public function show($date_report)
    {
       $total_sale_cash = DB::table('sales_cash_view')
        ->select('total_sale_cash')
        ->where('day_sale_cash', $date_report)
        ->get();

        return view('report.show', compact('report'));
    }

    public function exportPdf()
    {
        
        $from = '2021-06-03 00:00:00';
        $to =  '2021-06-03 00:00:00';
        //$interval = new DateInterval('P1D');
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
    }
}
