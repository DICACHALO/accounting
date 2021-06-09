<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Reporte cuadre de caja</h2>
<table>
 <tr>
    <td>
         <table>
            <tr>
                <th>Fecha</th>
                <th>Ventas en efectivo</th>
                
            </tr>
            
            @foreach($period as $day)
                @foreach($total_sale_cash as $total)
                    @if ($total->day_sale_cash == $day)
                        <tr><td>{{$day->format("Y-m-d")}}</td><td>{{'$'. number_format($total->total_sale_cash, 0) }}</td></tr>                        
                    @endif
                @endforeach 
            @endforeach 
            
                </tr>
            </table>
       </td>         
   </tr>
</table>


</body>
</html>
