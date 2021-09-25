<!DOCTYPE html>
<html>
    <head>
        <style>

        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        margin-top:20px;
        padding: auto;
        }

        th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        width: 100px;
        }

        td {
        border: 1px solid #dddddd;
        text-align: left;
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
<strong> Informe detallado del {{$fromDate}} al {{$toDate}} </strong>
    <table>
    <tr>
        <td>
        <table>
            <caption align="center"><strong> VENTAS </strong></caption>
            <thead>
            <tr>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Valor</th>
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

    <table>
    <tr>
        <td>
        <table>
            <caption align="center"><strong> GASTOS </strong></caption>
            <thead>
            <tr>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Recibo</th>
                <th>Factura</th>
                <th>Valor</th>
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
    <footer>
    Fecha de impresión: {{ $today }}
    </footer>
</body>
</html>
