@extends('layouts.app')

@section('template_title')
    {{ $sale->name ?? 'Show Sale' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalles del registro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sales.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $sale->date_sale }}
                        </div>
                        <div class="form-group">
                            <strong>Valor:</strong>
                            {{ $sale->price_sale }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $sale->type_sale }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $sale->description_sale }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
