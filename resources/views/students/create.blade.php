@extends('layouts.app')
@section('main')

{!! Form::open([
    'route' => 'students.store'
]) !!}

<h1>Add new student</h1>

<div class="form-group">
    {!! Form::label('nis', 'NIS:', ['class' => 'control-label']) !!}
    {!! Form::text('nis', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Nama:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('is_active', 'Dapat dipinjam:', ['class' => 'control-label']) !!}
    {!! Form::radio('is_active', '1') !!} ya
    {!! Form::radio('is_active', '0') !!} tidak
</div>

{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop

@extends('layouts.footapp')