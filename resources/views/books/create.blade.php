@extends('layouts.app')
@section('main')

{!! Form::open([
    'route' => 'books.store'
]) !!}

<h1>Add new book</h1>

<!-- <div class="form-group">
    {!! Form::label('barcode', 'Barcode:', ['class' => 'control-label']) !!}
    {!! Form::text('barcode', null, ['class' => 'form-control']) !!}
</div> -->

<div class="form-group">
    {!! Form::label('title', 'Judul:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('author', 'Pengarang:', ['class' => 'control-label']) !!}
    {!! Form::text('author', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('category', 'Kategori:', ['class' => 'control-label']) !!}
    {!! Form::select('id_category', $categories, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('can_be_borrowed', 'Dapat dipinjam:', ['class' => 'control-label']) !!}
    {!! Form::radio('can_be_borrowed', '1') !!} ya
    {!! Form::radio('can_be_borrowed', '0') !!} tidak
</div>

<div class="form-group">
    {!! Form::label('quantity', 'Jumlah:', ['class' => 'control-label']) !!}
    {!! Form::text('quantity', 1, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop

@extends('layouts.footapp')