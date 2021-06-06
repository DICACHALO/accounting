<div class="col-sm-12">
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Fecha') }}
            {{ Form::date('date_expense', $expense->date_expense, ['class' => 'form-control' . ($errors->has('date_expense') ? ' is-invalid' : ''), 'placeholder' => 'Date Expense']) }}
            {!! $errors->first('date_expense', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Número de factura') }}
            {{ Form::text('invoice', $expense->invoice, ['class' => 'form-control' . ($errors->has('invoice') ? ' is-invalid' : ''), 'placeholder' => '###']) }}
            {!! $errors->first('invoice', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Proveedor') }}
            {{ Form::text('merchandise_supplier', $expense->merchandise_supplier, ['class' => 'form-control' . ($errors->has('merchandise_supplier') ? ' is-invalid' : ''), 'placeholder' => 'Ejemplo: Tonos']) }}
            {!! $errors->first('merchandise_supplier', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Valor') }}
            {{ Form::number('price_expense', $expense->price_expense, ['class' => 'form-control' . ($errors->has('price_expense') ? ' is-invalid' : ''), 'placeholder' => '$$$']) }}
            {!! $errors->first('price_expense', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipo de gasto') }}
            <?php
                $options = ['Efectivo' => 'Efectivo', 'Consignación' => 'Consignación'];
                $selection = ['Efectivo']; 
            ?>
            {{ Form::select('type_expense', $options, $selection, ['class' => 'form-control'. ($errors->has('description_sale') ? ' is-invalid' : ''),]), }}
            
        </div>
        <div class="form-group">
            {{ Form::label('Número de recibo') }}
            {{ Form::text('receipt_number', $expense->receipt_number, ['class' => 'form-control' . ($errors->has('receipt_number') ? ' is-invalid' : ''), 'placeholder' => '###']) }}
            {!! $errors->first('receipt_number', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Observaciones') }}
            {{ Form::text('description_expense', $expense->description_expense, ['class' => 'form-control' . ($errors->has('description_expense') ? ' is-invalid' : ''), 'placeholder' => 'Campo opcional']) }}
            {!! $errors->first('description_expense', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
</div>