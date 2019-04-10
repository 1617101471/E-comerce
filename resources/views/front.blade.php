@extends('layouts.frontend')
@section('content')
<!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(frontend/images/kripcokfoto.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							Koleksi kami
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							Kripik Singkong Coklat Manis
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="{{route('produk')}}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Beli sekarang
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" style="background-image: url(frontend/images/kripcokfoto1.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
							Kripcok
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
							Keripik manis asli garut
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
							<!-- Button -->
							<a href="{{route('produk')}}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Beli Sekarang
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item3-slick1" style="background-image: url(frontend/images/kripcokfoto3.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
							Kripcok
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
							Bisa dimakan dan dibawa kemana-mana.
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
							<!-- Button -->
							<a href="{{route('produk')}}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Beli Sekarang
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>


@php
$produks = \App\Produk::paginate(4);
@endphp
	<!-- New Product -->
	<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Featured Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					@foreach($produks as $data)
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="{{ asset('/assets/img/gambar/' .$data->gambar)}}" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4"><a href="{{url('add-cart', $data->id)}}">
											Add to Cart</a>
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="/produk/single/{{$data->id}}" class="block2-name dis-block s-text3 p-b-5">
									{{$data->nama_produk}}
								</a>

								<span class="block2-price m-text6 p-r-5">
									Rp. {{$data->harga}}
								</span>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>

		</div>
	</section>

@php
$artikel = \App\Artikel::paginate(3);
@endphp
	<!-- Blog -->
	<section class="blog bgwhite p-t-94 p-b-65">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
					Blog Kami
				</h3>
			</div>

			<div class="row">
				@foreach($artikel as $data)
				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<!-- Block3 -->
					<div class="block3">
						<a href="/artikel/single/{{$data->slug}}" class="block3-img dis-block hov-img-zoom">
							<img src="{{ asset('/assets/img/gambar/' .$data->gambar)}}" style="height: 250px;" alt="IMG-BLOG">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="/artikel/single/{{$data->slug}}" class="m-text11">
									{{ $data->judul }}
								</a>
							</h4>

							<span class="s-text6">By</span> <span class="s-text7">{{ $data->user->name }}</span>
							<span class="s-text6">on</span> <span class="s-text7">{{ $data->created_at}}</span>

							<p class="s-text8 p-t-16">
								{!! str_limit($data->content,100) !!}
							</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
@php
$galeris = \App\Galeri::paginate(4);
@endphp
	<!-- Instagram -->
	<section class="instagram p-t-20">
		<div class="sec-title p-b-52 p-l-15 p-r-15">
			<h3 class="m-text5 t-center">
				Galeri
			</h3>
		</div>

		<div class="flex-w">
			<!-- Block4 -->
			@foreach($galeris as $data)
			<div class="block4 wrap-pic-w">
				<a title="{!! $data->content !!}" href="{{ asset('assets/img/gambar/' .$data->gambar)}}" style="width: 383px; height: 380px;">
				<img src="{{ asset('assets/img/gambar/' .$data->gambar)}}" alt=""></a>
			</div>
			@endforeach
		</div>
	</section>

	<!-- Shipping -->
	<section class="shipping bgwhite p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Free Delivery Worldwide
				</h4>

				<a href="#" class="s-text11 t-center">
					Click here for more info
				</a>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h4 class="m-text12 t-center">
					30 Days Return
				</h4>

				<span class="s-text11 t-center">
					Simply return it within 30 days for an exchange.
				</span>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Store Opening
				</h4>

				<span class="s-text11 t-center">
					Shop open from Monday to Sunday
				</span>
			</div>
		</div>
	</section>
@endsection
