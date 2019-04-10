@extends('layouts.backend')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12"><br>
			<div class="card card-primary">
			  <div class="card-header">Tambah Data Produk 
			  	<div class="card-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="card-body">
			  	<form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
			  		@csrf
			  		<div class="form-group {{ $errors->has('nama_produk') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Produk</label>	
			  			<input type="text" name="nama_produk" class="form-control"  required>
			  			<label for="cc-payment" class="control-label mb-1">gambar</label>
			  			<input type="file" name="gambar" class="form-control" required>
			  			@if ($errors->has('nama_produk'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_produk') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		

			  		<div class="form-group {{ $errors->has('harga') ? ' has-error' : '' }}">
			  			<label class="control-label">harga</label>	
			  			<input type="number" name="harga" class="form-control"  required>
			  			@if ($errors->has('harga'))
                            <span class="help-block">
                                <strong>{{ $errors->first('harga') }}</strong>
                            </span>
                        @endif
			  		</div>	

			  		<div class="form-group {{ $errors->has('stok') ? ' has-error' : '' }}">
			  			<label class="control-label">Stok</label>	
			  			<input type="text" name="stok" class="form-control"  required>
			  			@if ($errors->has('stok'))
                            <span class="help-block">
                                <strong>{{ $errors->first('stok') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
			  			<label class="control-label">Content</label>	
			  			<textarea id="text" type="ckeditor" name="content" class="ckeditor"  required></textarea>
			  			@if ($errors->has('content'))
                            <span class="help-block">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-outline-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
	<script type="text/javascript" src="{{asset ('ckeditor/ckeditor.js')}}"></script>
</div>
@endsection