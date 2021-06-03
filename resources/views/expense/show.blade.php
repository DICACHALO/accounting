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
                            <span class="card-title">Show Expense</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('expenses.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Date Expense:</strong>
                            {{ $expense->date_expense }}
                        </div>
                        <div class="form-group">
                            <strong>Invoice:</strong>
                            {{ $expense->invoice }}
                        </div>
                        <div class="form-group">
                            <strong>Merchandise Supplier:</strong>
                            {{ $expense->merchandise_supplier }}
                        </div>
                        <div class="form-group">
                            <strong>Price Expense:</strong>
                            {{ $expense->price_expense }}
                        </div>
                        <div class="form-group">
                            <strong>Type Expense:</strong>
                            {{ $expense->type_expense }}
                        </div>
                        <div class="form-group">
                            <strong>Receipt Number:</strong>
                            {{ $expense->receipt_number }}
                        </div>
                        <div class="form-group">
                            <strong>Description Expense:</strong>
                            {{ $expense->description_expense }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
