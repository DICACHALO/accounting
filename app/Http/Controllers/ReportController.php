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
        
        $from = '2021-05-03 00:00:00';
        $to =  '2021-06-08 00:00:00';
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

        $pdf   = PDF::loadView('pdf.report', compact('period', 'total_sale_cash','total_sale_baucher'));
        return $pdf->stream('report.pdf');
    }
}
