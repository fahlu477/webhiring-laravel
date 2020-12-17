<div class="col-12 col-md-4">
    <div class="mosh-blog-sidebar">

        <div class="blog-post-search-widget mb-100">
            <form action="#">
                <input type="search" name="search" id="Search">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>

        <div class="blog-post-categories mb-100">
            <h5>Experience</h5>
            <ul>
                @foreach($experiences as $key => $experience)
                    <li><a href="{{ route('career.index', ['experience' => $key ]) }}">{{ $experience }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="latest-blog-posts mb-100">
            <h5>Latest Posts</h5>
            <!-- Single Latest Blog Post -->
            <div class="single-latest-blog-post d-flex">
                <div class="latest-blog-post-thumb">
                    <img src="{{ asset('template/mosh/img/blog-img/lb-1.jpg') }}" alt="">
                </div>
                <div class="latest-blog-post-content">
                    <h6><a href="https://www.patrolicyber.com/2018/11/15/dansektor-21-puas-ipal-pt-kamarga-kurnia-sesuai-parameter-yang-diharapkan/">Dansektor 21 Puas, IPAL PT Kamarga Kurnia Sesuai Parameter yang Diharapkan</a></h6>
                    <div class="post-meta">
                        <h6>By <a href="#">Penulis cyber -</a>/<a href="#">15 November 2018</a></h6>
                    </div>
                </div>
            </div>
            <!-- Single Latest Blog Post -->
            <div class="single-latest-blog-post d-flex">
                <div class="latest-blog-post-thumb">
                    <img src="{{ asset('template/mosh/img/blog-img/lb-2.jpg') }}" alt="">
                </div>
                <div class="latest-blog-post-content">
                    <h6><a href="http://arcom.co.id/2018/11/15/dansektor-21-satgas-citarum-sidak-ipal-pt-kamarga-kurnia/">Dansektor 21 Satgas Citarum Sidak IPAL PT Kamarga Kurnia</a></h6>
                    <div class="post-meta">
                        <h6>By <a href="#"> Peristiwa by admin</a>/<a href="#">Posted on 15/11/2018</a></h6>
                    </div>
                </div>
            </div>
            <!-- Single Latest Blog Post -->
            <div class="single-latest-blog-post d-flex">
                <div class="latest-blog-post-thumb">
                    <img src="{{ asset('template/mosh/img/blog-img/lb-3.jpg') }}" alt="">
                </div>
                <div class="latest-blog-post-content">
                    <h6><a href="http://sorotindonesia.com/disidak-komandan-sektor-21-satgas-citarum-ini-hasil-olahan-limbah-pt-kamarga-kurnia/">Disidak Komandan Sektor 21 Satgas Citarum, Ini Hasil Olahan Limbah PT Kamarga Kurnia</a></h6>
                    <div class="post-meta">
                        <h6>By <a href="#">Sorot Indonesia</a>/<a href="#">November 15, 2018 </a></h6>
                    </div>
                </div>
            </div>
            <!-- Single Latest Blog Post -->
            <div class="single-latest-blog-post d-flex">
                <div class="latest-blog-post-thumb">
                    <img src="{{ asset('template/mosh/img/blog-img/lb-4.jpg') }}" alt="">
                </div>
                <div class="latest-blog-post-content">
                    <h6><a href="#">Dansektor 21 Apresiasi Penataan IPAL PT Kamarga Kurnia</a></h6>
                    <div class="post-meta">
                        <h6>By <a href="#">Ken Zanindha </a>/<a href="#">Rabu, 14 November 2018 </a></h6>
                    </div>
                </div>
            </div>
        </div>

         <!-- <div class="instagram-feeds">
            <h5>Instagram</h5>
            <ul>
                <li><a href="#"><img src="{{ asset('template/mosh/img/blog-img/ins-1.jpg') }}" alt=""></a></li>
                <li><a href="#"><img src="{{ asset('template/mosh/img/blog-img/ins-2.jpg') }}" alt=""></a></li>
                <li><a href="#"><img src="{{ asset('template/mosh/img/blog-img/ins-3.jpg') }}" alt=""></a></li>
                <li><a href="#"><img src="{{ asset('template/mosh/img/blog-img/ins-4.jpg') }}" alt=""></a></li>
                <li><a href="#"><img src="{{ asset('template/mosh/img/blog-img/ins-5.jpg') }}" alt=""></a></li>
                <li><a href="#"><img src="{{ asset('template/mosh/img/blog-img/ins-6.jpg') }}" alt=""></a></li>
            </ul>
        </div>-->
    </div>
</div>
