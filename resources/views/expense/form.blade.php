<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('date_expense') }}
            {{ Form::text('date_expense', $expense->date_expense, ['class' => 'form-control' . ($errors->has('date_expense') ? ' is-invalid' : ''), 'placeholder' => 'Date Expense']) }}
            {!! $errors->first('date_expense', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('invoice') }}
            {{ Form::text('invoice', $expense->invoice, ['class' => 'form-control' . ($errors->has('invoice') ? ' is-invalid' : ''), 'placeholder' => 'Invoice']) }}
            {!! $errors->first('invoice', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('merchandise_supplier') }}
            {{ Form::text('merchandise_supplier', $expense->merchandise_supplier, ['class' => 'form-control' . ($errors->has('merchandise_supplier') ? ' is-invalid' : ''), 'placeholder' => 'Merchandise Supplier']) }}
            {!! $errors->first('merchandise_supplier', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('price_expense') }}
            {{ Form::text('price_expense', $expense->price_expense, ['class' => 'form-control' . ($errors->has('price_expense') ? ' is-invalid' : ''), 'placeholder' => 'Price Expense']) }}
            {!! $errors->first('price_expense', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type_expense') }}
            {{ Form::text('type_expense', $expense->type_expense, ['class' => 'form-control' . ($errors->has('type_expense') ? ' is-invalid' : ''), 'placeholder' => 'Type Expense']) }}
            {!! $errors->first('type_expense', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('receipt_number') }}
            {{ Form::text('receipt_number', $expense->receipt_number, ['class' => 'form-control' . ($errors->has('receipt_number') ? ' is-invalid' : ''), 'placeholder' => 'Receipt Number']) }}
            {!! $errors->first('receipt_number', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description_expense') }}
            {{ Form::text('description_expense', $expense->description_expense, ['class' => 'form-control' . ($errors->has('description_expense') ? ' is-invalid' : ''), 'placeholder' => 'Description Expense']) }}
            {!! $errors->first('description_expense', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>