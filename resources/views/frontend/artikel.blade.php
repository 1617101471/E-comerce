

@extends('layouts.frontend')
@section('content')
<!-- Title Page -->
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(frontend/images/kripcokfoto1.jpg);">
        <h2 class="l-text2 t-center">
            Blog
        </h2>
    </section>

    <!-- content page -->
    <section class="bgwhite p-t-60">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9 p-b-75">
                    <div class="p-r-50 p-r-0-lg">
                        <!-- item blog -->
                        @foreach($artikels as $data)
                        <div class="item-blog p-b-80">
                            <a href="/artikel/single/{{$data->slug}}" class="item-blog-img pos-relative dis-block hov-img-zoom">
                                <img src="{{ asset('assets/img/gambar/'.$data->gambar) }}" style="height: 500px; margin-top: 60px;" alt="IMG-BLOG">

                            </a>

                            <div class="item-blog-txt p-t-33">
                                <h4 class="p-b-11">
                                    <a href="/artikel/single/{{$data->slug}}" class="m-text24">
                                        {{ $data->judul }}
                                    </a>
                                </h4>

                                <div class="s-text8 flex-w flex-m p-b-21">
                                    <span>
                                        By {{$data->user->name}}
                                        <span class="m-l-3 m-r-6">|</span>
                                    </span>

                                    <span>
                                        On {{ $data->created_at }}
                                    </span>
                                </div>

                                <p class="p-b-12">
                                    {!! $data->content !!}
                                </p>

                                <a href="/artikel/single/{{$data->slug}}" class="s-text20">
                                    Continue Reading
                                    <i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="pagination flex-m flex-w p-r-50">
                        <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
                        <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
                    </div>
                </div>

              {{--  view composer  --}}
            @include('frontend.sideproduk')
            {{--  end view composer  --}}  
            </div>
        </div>
    </section>
@endsection