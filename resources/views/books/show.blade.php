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
	<div class="box-header">
		<h3 class="box-title">{{ $books[0]->title }}</h3>
	</div>
	
	<div class="box-body">
	@if ($books)
	    <table class="table table-hover table-bordered dataTable">
	        <thead>
	            <tr>
			        <th>ID</th>
			        <th>Judul</th>
			        <th>Pengarang</th>
			        <th>Kategori</th>
			        <th>Tersedia</th>
			        <th>Aksi</th>
	            </tr>
	        </thead>

	        <tbody>
	            @foreach ($books as $book)
	                <tr>
				          <td>{{ $book->barcode }}</td>
				          <td>{{ $book->title }}</td>
				          <td>{{ $book->author }}</td>
				          <td>{{ $book->category }}</td>
				          @if ($book->status == 1)
				          <td> <span class="label label-success"> Ada </span> </td> 
				          	@else 
				          <td> <span class="label label-danger"> Tidak ada </span> </td> @endif
		                  <td>
		                  	{!! link_to_route('books.history', 'History', array($book->barcode), array('class' => 'btn-sm btn-success')) !!}
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