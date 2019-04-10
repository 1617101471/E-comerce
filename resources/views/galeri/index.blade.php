@extends('layouts.backend')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-12"><br>
			<div class="card card-primary">
			  <div class="card-header">Galeri
			  	<div class="card-title pull-right">
			  		<a href="{{ route('galeri.create') }}">Tambah Data</a>
			  	</div>
			  </div>
			  <div class="card-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Gambar</th>
					  <th>Deskripsi</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		@php $no = 1; @endphp
				  		@foreach($galeris as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td><img src="{{ asset('assets/img/gambar/' .$data->gambar)}}" style="max-height: 125px; max-width: 125px; margin-top: 7px;"></td>
				    	<td>{!! $data->content !!}</td>
						<td>
							<a class="btn btn-outline-warning" href="{{ route('galeri.edit',$data->id) }}">Edit</a>
						</td>
						<!-- <td>
							<a href="{{ route('galeri.show',$data->id) }}" class="btn btn-success">Show</a>
						</td> -->
						<td>
							<form method="post" action="{{ route('galeri.destroy',$data->id) }}">
								@csrf
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-outline-danger"  onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Delete</button>
							</form>
						</td>
				      @endforeach	
				  	</tbody>
				  </table>
				  {{ $galeris->links() }}
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection
