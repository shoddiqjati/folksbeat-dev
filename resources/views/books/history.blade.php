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
        <h3 class="box-title"> {{ $book->title }}</h3>
    </div>

    <div class="box-body">
    <?php $no = 0 ?>
    @if ($histories)

            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul buku </th>
                        <th>Kode buku</th>
                        <th>NIS Peminjam</th>
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
                              <td>{{ $history->id }}</td>
                              <th>{{ $history->student }}</th>
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