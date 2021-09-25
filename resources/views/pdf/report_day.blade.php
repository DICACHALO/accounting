<!DOCTYPE html>
<html>
    <head>
        <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }
        body {
            margin: 3cm 2cm 2cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            color: black;
            text-align: center;
            line-height: 30px;
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            color: black;
            text-align: center;
            line-height: 35px;
        }
        .page-break {
            page-break-after: always;
        }
        table {
        font-family: arial, sans-serif;
        font-size: 11px;
        border-collapse: collapse;
        width: 100%;
        margin-top:20px;
        padding: auto;
        }

        th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        td {
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
<header>
<h2 align="center"> ALMACÉN INSTITUTO DE BELLEZA MARLENE</h2>
<strong> Informe detallado del {{$fromDate}} al {{$toDate}} </strong>
</header>
<main>
    

<div class="container">
    <table>
    <tr>
        <td>
        <table>
            <caption align="center"><strong> VENTAS </strong></caption>
            <thead>
            <tr>
                <th style="width:10%;">Fecha</th>
                <th style="width:15%;">Tipo</th>
                <th style="width:60%;">Descripción</th>
                <th style="width:15%;">Valor</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sales as $info)
                <tr>
                    <td>{{ substr($info->date_sale, 0,-9) }}</td>
                    <td>{{ $info->type_sale }}</td>
                    <td>{{ $info->description_sale }}</td>
                    <td>${{ number_format($info->price_sale) }}</td>
                </tr>
            @endforeach
            </tr>
            <tbody>
        </table>
    </td>
    </tr>
    </table>
<div class="page-break"></div>
    <table>
    <tr>
        <td>
        <table>
            <caption align="center"><strong> GASTOS </strong></caption>
            <thead>
            <tr>
                <th style="width:10%;">Fecha</th>
                <th style="width:10%;">Tipo</th>
                <th style="width:20%;">Nombre</th>
                <th style="width:20%;">Descripción</th>
                <th style="width:10%;">Recibo</th>
                <th style="width:10%;">Factura</th>
                <th style="width:10%;">Valor</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($expenses as $info)
                <tr>
                    <td>{{ substr($info->date_expense, 0,-9) }}</td>
                    <td>{{ $info->type_expense }}</td>
                    <td>{{ $info->merchandise_supplier }}</td>
                    <td>{{ $info->description_expense }}</td>
                    <td>{{ $info->receipt_number }}</td>
                    <td>{{ $info->invoice }}</td>
                    <td>${{ number_format($info->price_expense) }}</td>
                </tr>
            @endforeach
            </tr>
            <tbody>
        </table>
    </td>
    </tr>
    </table>
    </main>
    <footer>
    Fecha de impresión: {{ $today }}
    </footer>
</body>
</html>
