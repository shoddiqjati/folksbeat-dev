@extends('layouts.app')

@section('main')

{!! Form::model($student, array('method' => 'PATCH', 'route' => array('students.update', $student->nis))) !!}

<h1>Ubah Siswa</h1>

<div class="form-group">
    {!! Form::label('nis', 'NIS:', ['class' => 'control-label']) !!}
    {!! Form::text('nis', $student->nis, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Nama:', ['class' => 'control-label']) !!}
    {!! Form::text('name', $student->name, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('is_active', 'Status:', ['class' => 'control-label']) !!}
    {!! Form::radio('is_active', '1', $student->is_active==1) !!} Aktif
    {!! Form::radio('is_active', '0', $student->is_active==0) !!} Tidak aktif
</div>

<?php $dt = new DateTime();
echo $dt->format('Y-m-d H:i:s'); ?>

{!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop

@extends('layouts.footapp')