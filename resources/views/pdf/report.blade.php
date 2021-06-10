<!DOCTYPE html>
<html>
<head>
<style>
.table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}


td {
  border: 1px solid #dddddd;
  text-align: right;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

footer {
            color: black;
            text-align: center;
        }
</style>
</head>
<body>
<h2 align="center"> ALMACÉN INSTITUTO DE BELLEZA MARLENE</h2>
<br>
<h3>Reporte cuadre de caja</h3>
<hr>
<table>
 <tr>
    <td>
         <table>
            <thead>
            <tr>
                <th>Fecha</th>
                <th>Ventas en efectivo</th>
                <th>Ventas con baucher</th>
                <th>Total ventas</th>
                <th>Gastos en efectivo</th>
                <th>Consignaciones</th>
                <th>Total gastos</th>
                <th>Efectivo en caja</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($temporal as $info)
                <tr>
                    <td>{{ $info->day_temporal }}</td>
                    <td>{{ number_format($info->total_sale_cash) }}</td>
                    <td>{{ number_format($info->total_sale_baucher) }}</td>
                    <td>{{ number_format($info->total_sales) }}</td>
                    <td>{{ number_format($info->total_expense_cash) }}</td>
                    <td>{{ number_format($info->total_expense_baucher) }}</td>
                    <td>{{ number_format($info->total_expenses) }}</td>
                    <td>{{ number_format($info->total_cash_day) }}</td>
                </tr>
            @endforeach
                
               
      

                </tr>
                <tbody>
            </table>
       </td>         
   </tr>
</table>
<footer>

    <p>Fecha de generación del reporte: {{ $today }} </p>
</footer>
</body>
</html>
