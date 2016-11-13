@extends('layouts.app')
@section('main')
	<section class="content-header">
		<h1>
			Daftar Buku
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
			<li class="active">Buku</li>
		</ol>
	</section>

<div class="box">                    
	<div class"box-header">
		{!! Form::model($books, array('method' => 'PATCH', 'route' => array('books.index'))) !!}
		<div class="col-sm-9"><input type='text' id='filter' name='filter' value='{{ $filter }}' placeholder='Search' class='form-control'></div>
		<div class="col-sm-1"><button type="submit" class="btn btn-info">Cari</button></div>
		<div class="col-sm-2"> {!! link_to_route('books.create', 'Tambah Buku', array(), array('class' => 'btn btn-success')) !!}</div>
	</div>
	<div class="box-body">
	@if ($books)
	    <table class="table table-bordered table-hover dataTable">
	        <thead>
	            <tr>
			        <th>ID</th>
			        <th>Judul</th>
			        <th>Pengarang</th>
			        <th>Kategori</th>
			        <th>Stok</th>
			        <th>Tersedia</th>
			        <th>Dapat dipinjam</th>
			        <th>Aksi</th>
	            </tr>
	        </thead>

	        <tbody>
	            @foreach ($books as $book)
	                <tr>
				          <td>{{ $book->id }}</td>
				          <td>{{ $book->title }}</td>
				          <td>{{ $book->author }}</td>
				          <td>{{ $book->category }}</td>
				          <td>{{ $book->quantity }}</td>
				          <td>{{ $book->availability }}</td>
				          <td>@if ($book->can_be_borrowed == 1) ya @else tidak @endif</td>
		                  <td>
		                  	{!! link_to_route('books.show', 'Show', array($book->id), array('class' => 'btn-sm btn-success')) !!}
		                  	{!! link_to_route('books.edit', 'Edit', array($book->id), array('class' => 'btn-sm btn-info')) !!} 
		                  	{!! link_to_route('books.delete', 'Delete', array($book->id), array('class' => 'btn-sm btn-danger')) !!}
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
{!! Form::close() !!}

@stop
@extends('layouts.footapp')