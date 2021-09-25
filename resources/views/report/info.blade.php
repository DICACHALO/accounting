<div class="card-header bg-white">
    <strong>Registra tus movimientos contables del día:</strong>
</div>

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    
    <br>
    
    <a class="btn btn-success btn-lg btn-block" data-toggle="button" aria-pressed="true" href="{{ route('sales.index') }}">{{ __('Tirillas de venta') }}</a>
    <br><br>
    <a class="btn btn-danger btn-lg btn-block" data-toggle="button" aria-pressed="true" href="{{ route('expenses.index') }}">{{ __('Gastos') }}</a>    
</div>