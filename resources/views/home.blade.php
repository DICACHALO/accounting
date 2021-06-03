@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registra tus movimientos contables del día:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    <a class="btn btn-success btn-lg btn-block" data-toggle="button" aria-pressed="true" href="{{ route('sales.index') }}">{{ __('Tirillas de venta') }}</a>
                    <br><br>
                    <a class="btn btn-warning btn-lg btn-block" data-toggle="button" aria-pressed="true" href="{{ route('expenses.index') }}">{{ __('Gastos') }}</a>

                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
