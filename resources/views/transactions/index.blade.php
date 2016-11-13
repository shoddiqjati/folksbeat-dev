@extends('layouts.app')

@section('main')


<h1>Peminjaman</h1>

<div class="box">
    <div class="box-header">
        <h3 class="box-title"> Daftar Peminjaman </h3>
        <div style="float:right">{!! link_to_route('transactions.create', 'Tambah peminjaman', array(), array('class' => 'btn btn-success')) !!}</div>
    </div>

    <div class="box-body">
    <?php $no = 0; ?>
    @if ($transactions->count())
        <table class="table table-hover table-bordered dataTable">
            <thead>
                <tr>
    		        <th>No</th>
    		        <th>ID Buku</th>
    		        <th>ID Siswa</th>
    		        <th>Tanggal pinjam</th>
                    <th>Batas pengembalian</th>
                    <th>Tanggal kembali</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($transactions as $transaction)
                <?php $no = $no + 1; ?>
                    <tr>
    			          <td>{{ $no }}</td>
    			          <td>{{ $transaction->book_id }}</td>
    			          <td>{{ $transaction->student_id }}</td>
                          <td>{{ $transaction->borrowed_at }}</td>
                          <td>{{ $transaction->expired_at }}</td>
                          <td> 
                            @if($transaction->returned_at == null)
                                {!! link_to_route('transactions.edit', '', array($transaction->id), array('class' => 'btn-sm btn-info glyphicon glyphicon-ok')) !!} 
                            @else
                                {!! $transaction->returned_at !!}
                                @endif
                          </td>
    	                  <!-- <td>
    	                  	{!! link_to_route('transactions.edit', 'Edit', array($transaction->id), array('class' => 'btn btn-info')) !!} 
    	                  	{!! link_to_route('transactions.delete', 'Delete', array($transaction->id), array('class' => 'btn btn-danger')) !!}
    	                  </td> -->
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