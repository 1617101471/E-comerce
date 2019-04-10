@extends('layouts.backend')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12"><br>
			<div class="card card-primary">
			  <div class="card-header">Edit Data artikel
			  	<div class="card-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="card-body">
			  	<form action="{{ route('artikel.update',$artikels->id) }}" method="post" enctype="multipart/form-data" >
			  		<input name="_method" type="hidden" value="PATCH">
        			@csrf

        			<div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
			  			<label class="control-label">Judul</label>	
			  			<input type="text" name="judul" class="form-control" value="{{ $artikels->judul }}"  required>
			  			@if ($errors->has('judul'))
                            <span class="help-block">
                                <strong>{{ $errors->first('judul') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('id_user') ? ' has-error' : '' }}">
			  			<input type="hidden" name="id_user" value="{{ Auth::user()->id }}" class="form-control" >
			  			@if ($errors->has('id_user'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_user') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('gambar') ? ' has-error' : '' }}">
                    	<label class="cc-payment" class="control-label mb-1">Gambar</label>
			  			@if (isset ($artikels) && $artikels->gambar)
			  			<p>
			  				<br>
			  				<img src="{{ asset('assets/img/gambar/' .$artikels->gambar)}}" style="max-height: 125px; max-width: 125px; margin-top: 7px;" alt="">
			  			</p>
			  			@endif
			  			<input type="file" name="gambar" value="{{ $artikels->gambar }}">
                    </div>

			  		<!-- <div class="form-group {{ $errors->has('tgl_pinjam') ? ' has-error' : '' }}">
			  			<label class="control-label">Tanggal Pinjam</label>	
			  			<input type="date" name="tgl_pinjam" class="form-control" value="{{ $artikels->tgl_pinjam }}"  required>
			  			@if ($errors->has('tgl_pinjam'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tgl_pinjam') }}</strong>
                            </span>
                        @endif
			  		</div> -->

			  		<div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
			  			<label class="control-label">Content</label>
			  			<textarea id="text" type="ckeditor" name="content" class="ckeditor" required>{{ $artikels->content }}</textarea>	
			  			@if ($errors->has('content'))
                            <span class="help-block">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-outline-primary">Edit</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
	<script type="text/javascript" src="{{asset ('ckeditor/ckeditor.js')}}"></script>
</div>
@endsection