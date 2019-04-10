

@extends('layouts.backend')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12"><br>
			<div class="card card-primary">
			  <div class="card-header">Checkout
			  </div>
			  <div class="card-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
						<th>No</th>
						<th>Nama custom</th>
						<th>Alamat</th>
						<th>No Telepon</th>
						<th>Product yang dipesan</th>
						<th>Jumlah barang yang dipesan</th>
						<th>Pembayaran</th>
						<th>Pengiriman</th>
						<th>Tanggal Pemesanan</th>
						<th colspan="3">Action</th>
					</tr>
				  	</thead>
				  	<tbody>
				  		@php $no = 1; @endphp
						@foreach($customa as $data)
						<tr>
							<td> {{ $no++ }} </td>
							<td> {{ $data->nama}} </td>
							<td> {{ $data->alamat }} </td>
							<td> {{ $data->no_tlp }} </td>
							<td> {{ $data->Product->nama_produk }}</td>
							<td> {{ $data->jumlah }} </td>
							<td> {{ $data->pembayaran }} </td>
							<td> {{ $data->pengiriman }} </td>
					        <td> {{ date('M j, Y', strtotime($data->created_at)) }}</td>
						<td>
							<form method="post" action="{{ route('custom.destroy',$data->id) }}">
								@csrf
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-outline-danger"  onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Delete</button>
							</form>
						</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection