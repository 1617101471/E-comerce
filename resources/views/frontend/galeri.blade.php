@extends('layouts.guest')
@section('content')
<div scroll-spy="true" id="pic-gallery" class="chipsofic-content-block gallery-block">
        <div class="container">
              <div class="row">
                 <div class="col-md-12">
                       <div class="section-title text-center">
                            <h1>Galeri</h1>
                            <div class="chipsofic-subtitle">Periksa gambar produk kami yang luar biasa</div>
                       </div>
                   </div>
                </div>
        </div>
        <div class="gallery-area">
            <div class="container-fluid">
                <div class="row wow fadeInUp">
                    <!-- Gallery 1st Row Start -->
                    @foreach($galeris as $data)
                    <div class="col-sm-6 col-md-3">
                        <a title="{!! $data->content !!}" class="gallery-lightbox" href="{{asset('assets/img/gambar/' .$data->gambar)}}" style="width: 383px; height: 380px;">
                            <i class="fa fa-plus">
                            </i> <img src="{{asset('assets/img/gambar/' .$data->gambar)}}" alt=""></a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ba88a4fc666d426648b09cc/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
@endsection