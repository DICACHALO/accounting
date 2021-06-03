<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Fecha') }}
            {{ Form::date('date_sale', $sale->date_sale, ['class' => 'form-control' . ($errors->has('date_sale') ? ' is-invalid' : ''), 'placeholder' => 'Price Sale']) }}
            {!! $errors->first('date_sale', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Valor') }}
            {{ Form::number('price_sale', $sale->price_sale, ['class' => 'form-control' . ($errors->has('price_sale') ? ' is-invalid' : ''),'placeholder' => '$000']) }}
            {!! $errors->first('price_sale', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipo de venta') }}   
            <?php
                $options = ['Efectivo' => 'Efectivo', 'Baucher' => 'Baucher'];
                $selection = ['Efectivo']; 
            ?>
            {{ Form::select('type_sale', $options, $selection, ['class' => 'form-control'. ($errors->has('description_sale') ? ' is-invalid' : ''),]), }}
            
        </div>
        <div class="form-group">
            {{ Form::label('Descripción') }}
            {{ Form::text('description_sale', $sale->description_sale, ['class' => 'form-control','placeholder' => 'Campo opcional']) }}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>