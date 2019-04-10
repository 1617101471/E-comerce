

<div class="col-md-4 col-lg-3 p-b-80">
    <div class="rightbar">

        <!-- Featured Products -->
        <h4 class="m-text23 p-t-65 p-b-34">
            Blog Terbaru
        </h4>

        <ul class="bgwhite">
            @foreach($recent as $data)
            <li class="flex-w p-b-20">
                <a href="/artikel/single/{{$data->slug}}" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
                    <img src="{{ asset('assets/img/gambar/'.$data->gambar) }}" alt="IMG-PRODUCT">
                </a>

                <div class="w-size23 p-t-5">
                    <a href="/artikel/single/{{$data->slug}}" class="s-text20">
                        {{$data->judul}}
                    </a>

                    <span class="dis-block s-text17 p-t-6">
                        {{ $data->created_at->diffForHumans() }}
                    </span>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>