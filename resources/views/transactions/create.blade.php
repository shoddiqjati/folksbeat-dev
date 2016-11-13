@extends('layouts.app')

@section('main')

{!! Form::open([
    'route' => 'transactions.store'
]) !!}

<h1>Tambah peminjaman</h1>

<div class="form-group">
    {!! Form::label('book_id', 'ID Buku :', ['class' => 'control-label']) !!}
    {!! Form::select('book_id', $book_id, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('student_id', 'ID Siswa :', ['class' => 'control-label']) !!}
    {!! Form::select('student_id', $student_id, null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop

@extends('layouts.footapp')