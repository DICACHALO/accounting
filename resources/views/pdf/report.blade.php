<!DOCTYPE html>
<html>
<head>
<style>
.table {
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
                <th>Ventas con baucher</th>
                <th>Total ventas</th>
            </tr>

            @foreach($period as $day)
                <tr><td>{{$day->format("Y-m-d")}}</td>
                @foreach($total_sale_cash as $total)
                    @if ($total->day_sale_cash == $day)
                        <td>{{'$'. number_format($total->total_sale_cash, 0) }}</td>
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
