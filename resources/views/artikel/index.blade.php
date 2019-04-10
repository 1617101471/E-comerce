@extends('layouts.backend')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12"><br>
			<div class="card card-primary">
			  <div class="card-header">Artikel
			  	<div class="card-title pull-right">
			  		<a href="{{ route('artikel.create') }}">Tambah Data</a>
			  	</div>
			  </div>
			  <div class="card-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
			  		  <th>Judul</th>
					  <th>Nama Admin</th>
					  <th>Gambar</th>
					  <th>Content</th>
					  <th>Tanggal Buat</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		@php $no = 1; @endphp
				  		@foreach($artikels as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
						<td>{{ $data->judul }}</td>
				    	<td>
				    		{{ $data->user->name }}
						</td>
				    	<td><img src="{{ asset('/assets/img/gambar/' .$data->gambar)}}" style="max-height: 125px; max-width: 125px; margin-top: 7px;"></td>
				    	<td>{!! $data->content !!}</td>
				    	<td>{{ $data->created_at}}</td>
						<td>
							<a class="btn btn-outline-warning" href="{{ route('artikel.edit',$data->id) }}">Edit</a>
						</td>
						<!-- <td>
							<a href="{{ route('artikel.show',$data->id) }}" class="btn btn-success">Show</a>
						</td> -->
						<td>
							<form method="post" action="{{ route('artikel.destroy',$data->id) }}">
								@csrf
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-outline-danger"  onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Delete</button>
							</form>
						</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				  {{ $artikels->links() }}
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection