<!DOCTYPE html>
<html>
<head>
<style>
body{
    margin: 60px 60px 60px 40px;
}
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
    text-align: left;
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 40px;
        }

img{
    display:static;
margin-left: 150px;

}
</style>
</head>
<body>
    <div class="container">


<h2 align="center"> ALMACÉN INSTITUTO DE BELLEZA MARLENE</h2><br>
<img src="https://institutomarlene.edu.co/wp-content/uploads/2021/04/cropped-cropped-LogoMarleneWeb-04.png" alt="Logo">
<h3 align="center">Reporte cuadre de caja</h3>
<br>

<p> Informe resumido del <strong>{{ $fromDate }}</strong> al <strong>{{ $toDate }}</strong></p>
<br><br>

    <table align="center"><caption align="center"><strong> TOTAL DE VENTAS </strong></caption>
        <thead>
        <tr>
            <th>Efectivo</th>
            <th>Baucher</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td> $ {{ number_format($total_sale_cash) }}</td>
                <td> $ {{ number_format($total_sale_baucher) }}</td>
                <td> $ {{ number_format($total_sales) }}</td>
            </tr>
        <tbody>
    </table>

<br><br><br>

    <table align="center"><caption align="center"><strong> TOTAL DE GASTOS </strong></caption>
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

<p> Elabora: _____________________________ &nbsp;&nbsp;&nbsp;
    Recibe:  _____________________________ </p>
<br><br><br><br>
    </div>

<footer>
Fecha de impresión: {{ $today }}
</footer>
</body>
</html>
