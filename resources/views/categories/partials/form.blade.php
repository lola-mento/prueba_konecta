<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : null), 'placeholder' => 'Ingrese el nombre del producto']) !!}
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
