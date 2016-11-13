@extends('layouts.app')

@section('main')


{!! Form::model($transaction, array('method' => 'PATCH', 'route' => array('transactions.update', $transaction->id))) !!}


<div class="box">

    <div class="box-header">
    <h3 class="box-title"> Pengembalian pinjaman</h3>
    </div>

    <div class="box-body">
        <div class="form-group">
            {!! Form::label('book_id', 'ID Buku:', ['class' => 'control-label']) !!}
            {!! Form::text('book_id', $transaction->book_id, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('student_id', 'ID Siswa:', ['class' => 'control-label']) !!}
            {!! Form::text('student_id', $transaction->student_id, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('borrowed_at', 'Tanggal pinjam:', ['class' => 'control-label']) !!}
            {!! Form::text('borrowed_at', $transaction->borrowed_at, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('expired_at', 'Batas peminjaman:', ['class' => 'control-label']) !!}
            {!! Form::text('expired_at', $transaction->expired_at, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('returned_at', 'Tanggal kembali:', ['class' => 'control-label']) !!}
            {!! Form::text('returned_at', $datenow, ['class' => 'form-label', 'disabled' => 'disabled']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('denda', 'Denda:', ['class' => 'control-label']) !!}
            {!! Form::text('denda', $denda, ['class' => 'form-label', 'disabled' => 'disabled']) !!}
        </div>
        
        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

{!! Form::close() !!}

@stop

@extends('layouts.footapp')