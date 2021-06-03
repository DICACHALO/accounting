@extends('layouts.app')

@section('template_title')
    {{ $expense->name ?? 'Show Expense' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalle de gastos</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('expenses.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $expense->date_expense }}
                        </div>
                        <div class="form-group">
                            <strong>Factura:</strong>
                            {{ $expense->invoice }}
                        </div>
                        <div class="form-group">
                            <strong>Proveedor:</strong>
                            {{ $expense->merchandise_supplier }}
                        </div>
                        <div class="form-group">
                            <strong>Valor:</strong>
                            {{ $expense->price_expense }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de gasto:</strong>
                            {{ $expense->type_expense }}
                        </div>
                        <div class="form-group">
                            <strong>Número de recibo:</strong>
                            {{ $expense->receipt_number }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción del gasto:</strong>
                            {{ $expense->description_expense }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
