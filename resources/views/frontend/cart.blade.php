@extends('layouts.frontend')
@section('content')
<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<form method="post" action="{{url('cart/edit/'.Auth::user()->id)}}">
					@csrf
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
						</tr>

						@php
							$total_all = 0;
						@endphp

						@foreach($cart as $data)
						@php 
							$t_s = $data->jumlah * $data->product->harga;
							$total_all = $total_all + $t_s;
						@endphp
						<input type="hidden" name="id[]" value="{{$data->id}}">
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="{{ asset('assets/img/gambar/' .$data->product->gambar)}}" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2">{{$data->product->nama_produk}}</td>
							<td class="column-3">{{number_format($data->product->harga,2,',','.')}}</td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" type="number" name="jumlah[]" value="{{$data->jumlah}}">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2" >
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							<td class="column-5">{{number_format($data->jumlah * $data->product->harga,2,',','.')}}</td>
							<td>
								<a href="{{url('cart/delete', $data->id)}}" class="btn btn-danger">X</a>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Update Cart
					</button>
				</div>
			</div>
		</form>
		<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<form action="{{ url('checkout/'.Auth()->user()->id) }}" method="post" enctype="multipart/form-data" >
		  		@csrf
		  		<input type="hidden" name="chart" value="{{$cart}}">
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						{{number_format($total_all,2,',','.')}}
					</span>
				</div>

					<div class="w-size20 w-full-sm">
				  		<div class="size13 bo4 m-b-12 {{ $errors->has('alamat') ? ' has-error' : '' }}">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="alamat" placeholder="Alamat">
						@if ($errors->has('alamat'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('alamat') }}</strong>
	                            </span>
	                        @endif
						</div>

						<div class="size13 bo4 m-b-12 {{ $errors->has('no_tlp') ? ' has-error' : '' }}">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="number" name="no_tlp" placeholder="No Telepon">
						@if ($errors->has('no_tlp'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('no_tlp') }}</strong>
	                            </span>
	                        @endif
						</div>

						<div class="size13 bo4 m-b-12 {{ $errors->has('cek_pembayaran') ? ' has-error' : '' }}">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="cek_pembayaran" placeholder="Cek Pembayaran">
						@if ($errors->has('cek_pembayaran'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('cek_pembayaran') }}</strong>
	                            </span>
	                        @endif
						</div>

						<div class="size13 bo4 m-b-12 {{ $errors->has('pembayaran') ? ' has-error' : '' }}">
						<select class="form-control" name="pembayaran" required>
							<option>Pilih Pembayaran</option>
							<option>Bayar ditempat</option>
							<option>Transfer</option>
						</select>	
						@if ($errors->has('pembayaran'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('pembayaran') }}</strong>
	                            </span>
	                        @endif
						</div>

						<div class="size13 bo4 m-b-12 {{ $errors->has('pengiriman') ? ' has-error' : '' }}">
						<select class="form-control" name="pengiriman" required>
							<option>Pilih Pengiriman</option>
							<option>JNE</option>
							<option>J&t</option>
						</select>	
						@if ($errors->has('pengiriman'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('pengiriman') }}</strong>
	                            </span>
	                        @endif
						</div>

					</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Proceed to Checkout
					</button>
				</div>
			</form>
			</div>
		</div>
	</section>
@endsection	