@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <strong>Registra tus movimientos contables del día:</strong>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    <a class="btn btn-success btn-lg btn-block" data-toggle="button" aria-pressed="true" href="{{ route('sales.index') }}">{{ __('Tirillas de venta') }}</a>
                    <br><br>
                    <a class="btn btn-warning btn-lg btn-block" data-toggle="button" aria-pressed="true" href="{{ route('expenses.index') }}">{{ __('Gastos') }}</a>    
                </div>
           </div>
       </div>   
                <div class="col-sm-4">  
                    <div class="card">
                        <div class="card-header">
                        <strong>Reporte:</strong>
                        </div>
                    <div class="card-body">
                      <form method="POST" action="{{route('report_total') }}" >
                        @csrf
                          <div class="form-group">
                            <label>Selecciona una fecha inicial:</label>
                            <input name="date_ini" value="date" type="date" class="form-control" id="date_ini" >
                          </div>
                          <div class="form-group">
                            <label>Selecciona una fecha final:</label>
                            <input name="date_finish" value="date" type="date" class="form-control" id="date_finish" >
                          </div>
                          <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z"></path>
                <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z"></path>
                </svg>
                          Generar PDF
                      </button>
 
                      </form> 

                    </div> 

                </div>
            </div>

            <div class="col-sm-4">  
                <div class="card">
                    <div class="card-header">

                        <?php 
                         $dtz = new DateTimeZone("America/Panama");
    $dt = new DateTime("now", $dtz);
    $today = $dt->format("Y-m-d");
    
                        echo "<strong>Estado de cuenta del día de hoy: ";
                        echo $today;
                        echo "
                    </strong></div>
                    <div class='card-body'>
                        <table class='table table-striped'>";

                            
    
    
   

    
    $select1 = DB::table('sales_cash_view')->select('total_sale_cash')->where('day_sale_cash', $today)->get(); 
    $select2 = DB::table('sales_baucher_view')->select('total_sale_baucher')->where('day_sale_baucher',$today)->get(); 
        
        if(count($select1)>0){
            foreach ($select1 as $result1) {
            $total1 = $result1->total_sale_cash; };
            }else{
                $total1 = 0;                                    
            };


        if(count($select2)>0){  
            foreach ($select2 as $result2) {
            $total2 = $result2->total_sale_baucher; };
            }
        else{
            $total2 = 0;
        };
        


echo "<tr><td>Total de ventas en efectivo: </td>
    <td>";
echo "$" . number_format($total1);                           
            
echo "</td></tr><tr><td>Total de ventas por baucher: </td>
    <td>";
echo "$" . number_format($total2); 

echo "</td></tr><tr><td>Total de ventas: </td>
    <td>";

$total_sale = $total1+$total2; 

echo "$" . number_format($total_sale);


        echo "</td>
</tr>
</table>
<hr>

<table class='table table-striped'>";
 

    $select3 = DB::table('expenses_cash_view')->select('total_expense_cash')->where('day_expense_cash',$today)->get(); 
    $select4 = DB::table('expenses_baucher_view')->select('total_expense_baucher')->where('day_expense_baucher',$today)->get(); 
        

    if(count($select3)>0){
        foreach ($select3 as $result3) {
        $total3 = $result3->total_expense_cash; };
            }
        else{
            $total3 = 0;
        };
           
    if(count($select4)>0){
        foreach ($select4 as $result4) {
        $total4 = $result4->total_expense_baucher; };
          }
        else{
            $total4 = 0;
        }

echo "<tr><td>Total de gastos en efectivo: </td>
    <td>";
echo "$" . number_format($total3);                           
            
echo "</td></tr><tr><td>Gastos por consignación: </td>
    <td>";
echo "$" . number_format($total4); 

echo "</td></tr><tr><td>Total de gastos: </td>
    <td>";

$total_expense = $total3+$total4; 

echo "$" . number_format($total_expense);


echo "</td>
</tr>
</table>
<hr>
<p>Debes tener en caja:</p>   
<h3 align='center'><mark>";

$total= $total1-$total_expense;
echo "$" . number_format($total);

echo "</mark></h3>";
?>

</div>           
</div>
</div>
</div>
</div>
</div>           
</div>
@endsection