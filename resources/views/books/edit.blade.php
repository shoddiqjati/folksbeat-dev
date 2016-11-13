@extends('layouts.app')
@section('main')

{!! Form::model($book, array('method' => 'PATCH', 'route' => array('books.update', $book->id))) !!}

<h1> {{ $book->title }} </h1>

<div class="form-group">
    {!! Form::label('id', 'Barcode:', ['class' => 'control-label']) !!}
    {!! Form::text('id', $book->id, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<div class="form-group">
    {!! Form::label('title', 'Judul:', ['class' => 'control-label']) !!}
    {!! Form::text('title', $book->title, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('title', 'Pengarang:', ['class' => 'control-label']) !!}
    {!! Form::text('author', $book->author, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Kategori:', ['class' => 'control-label']) !!}
    {!! Form::select('id_category', $categories, $book->id_category, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('quantity', 'Jumlah buku:', ['class' => 'control-label']) !!}
    <input type='number' id='quantity' name='quantity' value='{!! $book->quantity !!}' min='{!! $book->quantity !!}' class='form-control'>
</div>

<div class="form-group">
    {!! Form::label('can_be_borrowed', 'Dapat dipinjam:', ['class' => 'control-label']) !!}
    {!! Form::radio('can_be_borrowed', '1', $book->can_be_borrowed==1) !!} ya
    {!! Form::radio('can_be_borrowed', '0', $book->can_be_borrowed==0) !!} tidak
</div>


{!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop

@extends('layouts.footapp')