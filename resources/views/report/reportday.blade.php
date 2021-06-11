<div class="card">
    <div class="card-header">
        @php 
    $dtz = new DateTimeZone("America/Panama");
    $dt = new DateTime("now", $dtz);
    $today = $dt->format("Y-m-d");
    $today_presentation = $dt->format("d-m-Y");
    
    echo "<strong>Estado de cuenta del día de hoy: ";
    echo $today_presentation;
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
@endphp
        </mark></h3>
    </div>           
</div>
           