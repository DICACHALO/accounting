<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\Expense;
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
}
