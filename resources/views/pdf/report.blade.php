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
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 40px;
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
    <table><caption align="center"><strong> INFORME RESUMIDO </strong></caption>
        <thead>
        <tr>
            <th>Fecha del reporte</th>
            <th>Total ventas en efectivo</th>
            <th>Total ventas con baucher</th>
            <th>Total ventas</th>
            <th>Total gastos en efectivo</th>
            <th>Total pagos por consignación</th>
            <th>Total gastos</th>
            <th>Efectivo en caja</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $today }}</td>
                <td>{{ number_format($total_sale_cash) }}</td>
                <td>{{ number_format($total_sale_baucher) }}</td>
                <td>{{ number_format($total_sales) }}</td>
                <td>{{ number_format($total_expense_cash) }}</td>
                <td>{{ number_format($total_expense_baucher) }}</td>
                <td>{{ number_format($total_expenses) }}</td>
                <td>{{ number_format($total_cash_day) }}</td>
            </tr>
         </tr>
        <tbody>
    </table>
    </td>         
   </tr>

</table>

<br>
<hr>    

<table>
 <tr>
    <td>
     <table>
        <caption align="center"><strong> INFORME DETALLADO </strong></caption>
        <thead>
        <tr>
            <th>Fecha</th>
            <th>Ventas en efectivo</th>
            <th>Ventas con baucher</th>
            <th>Total ventas</th>
            <th>Gastos en efectivo</th>
            <th>Pagos por consignación</th>
            <th>Total gastos</th>
            <th>Efectivo en caja</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($temporary as $info)
            <tr>
                <td>{{ $info->day_temporary }}</td>
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
    <p> Elabora: ____________________________ &nbsp;&nbsp;&nbsp; 
        Recibe: _____________________________ 
    </p>

    </footer>
</body>
</html>
