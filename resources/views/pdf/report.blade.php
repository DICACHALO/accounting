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
    <div class="container">
        

<h2 align="center"> ALMACÉN INSTITUTO DE BELLEZA MARLENE</h2>
<h3 align="center">Reporte cuadre de caja</h3>
<br>
<h4> Informe resumido del {{ $fromDate }} al {{ $toDate }}</h4>


    <table align="center"><caption align="center"><strong> 1.VENTAS </strong></caption>
        <thead>
        <tr>
            <th>Ventas en efectivo</th>
            <th>Ventas con baucher</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td> $ {{  number_format($total_sale_cash) }}</td>
                <td> $ {{ number_format($total_sale_baucher) }}</td>
                <td> $ {{ number_format($total_sales) }}</td>
            </tr>         
        <tbody>
    </table>

<br>

    <table align="center"><caption align="center"><strong> 2. GASTOS </strong></caption>
        <thead>
        <tr>
            <th>Efectivo</th>
            <th>Consignación</th>
            <th>Total</th>           
        </tr>
        </thead>
        <tbody>
            <tr>
                <td> $ {{ number_format($total_expense_cash) }}</td>
                <td> $ {{ number_format($total_expense_baucher) }}</td>
                <td> $ {{ number_format($total_expenses) }}</td>              
            </tr>
    
        <tbody>
    </table>

<br>   
<p><strong>Saldo en efectivo: </strong>$ {{ number_format($total_cash_day) }}</p>
<br>  

<p> Elabora: __________________________________ &nbsp;&nbsp;&nbsp; 
    Recibe:  __________________________________ </p>
<br><br><br><br>
    </div>

<footer>
    
Fecha de impresión: {{ $today }}
    </footer>
</body>
</html>
