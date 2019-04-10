@extends('layouts.backend')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12"><br>
			<div class="card card-primary">
			  <div class="card-header">Tambah Data Kontak 
			  	<div class="card-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="card-body">
			  	<form action="{{ route('kontak.store') }}" method="post" enctype="multipart/form-data">
			  		@csrf
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Kontak</label>	
			  			<input type="text" name="nama" class="form-control"  required>
			  			<label for="cc-payment" class="control-label mb-1">gambar</label>
			  			<input type="file" name="gambar" class="form-control" required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		

			  		<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
			  			<label class="control-label">Email</label>	
			  			<input type="email" name="email" class="form-control"  required>
			  			@if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('instagram') ? ' has-error' : '' }}">
			  			<label class="control-label">Instagram</label>	
			  			<input type="text" name="instagram" class="form-control"  required>
			  			@if ($errors->has('instagram'))
                            <span class="help-block">
                                <strong>{{ $errors->first('instagram') }}</strong>
                            </span>
                        @endif
			  		</div>	

			  		<div class="form-group {{ $errors->has('facebook') ? ' has-error' : '' }}">
			  			<label class="control-label">Facebook</label>	
			  			<input type="text" name="facebook" class="form-control"  required>
			  			@if ($errors->has('facebook'))
                            <span class="help-block">
                                <strong>{{ $errors->first('facebook') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('nohp') ? ' has-error' : '' }}">
			  			<label class="control-label">No Telepon</label>	
			  			<input type="number" name="nohp" class="form-control"  required>
			  			@if ($errors->has('nohp'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nohp') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
			  			<label class="control-label">Alamat</label>	
			  			<input type="text" name="alamat" class="form-control"  required>
			  			@if ($errors->has('alamat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alamat') }}</strong>
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