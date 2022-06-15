<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : null), 'placeholder' => 'Ingrese el nombre del producto']) !!}
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('reference', 'Referencia') !!}
    {!! Form::text('reference', null, ['class' => 'form-control'. ($errors->has('reference') ? ' is-invalid' : null), 'placeholder' => 'Ingrese la referencia']) !!}
    @error('reference')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('price', 'Precio') !!}
    {!! Form::number('price', null, ['class' => 'form-control'. ($errors->has('price') ? ' is-invalid' : null), 'placeholder' => 'Ingrese el precio del producto']) !!}
    @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('weight', 'Peso') !!}
    {!! Form::number('weight', null, ['class' => 'form-control'. ($errors->has('weight') ? ' is-invalid' : null), 'placeholder' => 'Ingrese el peso del producto']) !!}
    @error('weight')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    @error('category_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('stock', 'Cantidad') !!}
    {!! Form::number('stock', null, ['class' => 'form-control'. ($errors->has('stock') ? ' is-invalid' : null), 'placeholder' => 'Ingrese la existencia del producto']) !!}
    @error('stock')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
