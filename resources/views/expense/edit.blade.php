@extends('layouts.app')

@section('template_title')
    Actualizar gasto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-4 container-fluid">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar gasto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('expenses.update', $expense->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('expense.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
