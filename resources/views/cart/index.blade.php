@extends('layouts.backend')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12"><br>
			<div class="card card-primary">
			  <div class="card-header">Cart
			  	<div class="card-title pull-right">
			  	</div>
			  </div>
			  <div class="card-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Gambar</th>
			  		  <th>Nama Produk</th>
					  <th>Nama User</th>
					  <th>Jumlah Beli</th>
					  <th>Total</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		@php $no = 1; @endphp
				  		@foreach($carts as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td><img src="{{ asset('assets/img/gambar/' .$data->product->gambar)}}" style="max-height: 125px; max-width: 125px; margin-top: 7px;"></td>
				    	<td>{{ $data->product->nama_produk }}</td>
				    	<td>
				    		{{ $data->user->name }}
						</td>
						<td>{{ $data->jumlah }}</td>
						<td>Rp. {{number_format($data->jumlah * $data->product->harga,2,',','.')}}</td>
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