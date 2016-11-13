@extends('layouts.app')

@section('main')

<h1>{{ $student->name }}</h1>

<?php $no = 0 ?>
@if ($histories)

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
		        <th>No</th>
		        <th>Judul buku </th>
		        <th>Kode buku</th>
		        <th>Tanggal pinjam</th>
                <th>Batas peminjaman</th>
                <th>Tanggal kembali</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($histories as $history)
            <?php $no = $no +1 ?>
                <tr>
			          <td>{{ $no }}</td>
                      <td>{{ $history->title }}</td>
			          <td>{{ $history->borrowed_at }}</td>
			          <td>{{ $history->expired_at }}</td>
                      <td>{{ $history->returned_at }}</td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    There are no transactions
@endif

@stop

@extends('layouts.footapp')