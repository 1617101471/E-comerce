

@extends('layouts.frontend')
@section('content')
<section class="bgwhite p-t-60 p-b-25">
    <div class="container">
        <div class="sec-title p-b-52">
            <h3 class="m-text5 t-center">
                Blog Kami
            </h3>
        </div>
            
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-50 p-r-0-lg">
                    <div class="p-b-40">
                        <div class="blog-detail-img wrap-pic-w">
                            <img src="{{ asset('assets/img/gambar/'.$artikel->gambar) }}" width="500" height="500" style="margin-top: 65px;" alt="IMG-BLOG">
                        </div>

                        <div class="blog-detail-txt p-t-33">
                            <h4 class="p-b-11 m-text24">
                                {{ $artikel->judul }}
                            </h4>

                            <div class="s-text8 flex-w flex-m p-b-21">
                                <span>
                                    {{ $artikel->user->name }}
                                    <span class="m-l-3 m-r-6">|</span>
                                </span>

                                <span>
                                    {{ $artikel->created_at}}
                                    <span class="m-l-3 m-r-6">|</span>
                                </span>

                                <span>
                                    Cooking, Food
                                    <span class="m-l-3 m-r-6">|</span>
                                </span>
                            </div>

                            <p class="p-b-25">
                                {!! $artikel->content !!}
                            </p>
                        </div>
                    </div>

                    <!-- Leave a comment -->
                    
                </div>
            </div>

            {{--  view composer  --}}
                        @include('frontend.side')
                        {{--  end view composer  --}}
            
        </div>
        <div id="disqus_thread"></div>
                    <script>

                    /**
                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://kripcokcoment.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                                
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
    </div>

</section>
@endsection