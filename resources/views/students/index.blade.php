@extends('layouts.app')

@section('main')

<section class="content-header">
        <h1>
            Daftar Siswa
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
            <li class="active">Siswa</li>
        </ol>
</section>

<div class="box">
    <div class"box-header">
        {!! Form::model($students, array('method' => 'PATCH', 'route' => array('students.index'))) !!}
        <div class="col-sm-9"><input type='text' id='filter' name='filter' value='{{ $filter }}' placeholder='Search' class='form-control'></div>
        <div class="col-sm-1"><button type="submit" class="btn btn-info">Cari</button></div>
        <div class="col-sm-2"> {!! link_to_route('students.create', 'Tambah Siswa', array(), array('class' => 'btn btn-success')) !!}</div>
    </div>

    <div class="box-body">
    @if ($students->count())
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
    		        <th>NIS</th>
    		        <th>Nama</th>
    		        <th>Status</th>
    		        <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($students as $student)
                    <tr>
    			          <td>{{ $student->nis }}</td>
    			          <td>{{ $student->name }}</td>
    			          <td>{{ $student->is_active }}</td>
    	                  <td>
    	                  	{!! link_to_route('students.history', 'History', array($student->nis), array('class' => 'btn-sm btn-success')) !!}
    	                  	{!! link_to_route('students.edit', 'Edit', array($student->nis), array('class' => 'btn-sm btn-info')) !!} 
    	                  	{!! link_to_route('students.delete', 'Delete', array($student->nis), array('class' => 'btn-sm btn-danger')) !!}
    	                  </td>
                    </tr>
                @endforeach
                  
            </tbody>
          
        </table>
    @else
        There are no books
    @endif
    </div>
</div>

@stop

@extends('layouts.footapp')