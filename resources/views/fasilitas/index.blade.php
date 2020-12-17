@extends('layouts.home.app')

@include('fasilitas._welcome')

@section('content')
    <section class="mosh-aboutUs-area section_padding_100_0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <div class="mosh-about-us-content">
                        <div class="section-heading">
                            <p>Features</p>
                            <h2>Gambaran</h2>
                        </div>
                        <p>
                            Kemampuan kami untuk mengubah desain rumit dengan berbagai tekstur menjadi kain berkualitas
                            didukung oleh proses integrasi vertikal dari produksi benang, hingga produk jadi.Untuk
                            kerajinan kain berkualitas tinggi, kami juga perlu berinvestasi dalam mesin berkualitas
                            tinggi. Kami hati-hati hanya menginstal mesin terbaik dunia seperti Dornier, Van de Wiele,
                            dan Karl Mayer untuk hasil yang maksimal.Selain itu, kami mengerahkan kontrol kualitas dalam
                            setiap tahap proses produksi untuk menjamin standar kualitas yang tinggi disampaikan.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mosh-about-us-thumb wow fadeInUp" data-wow-delay="0.5s">
                        <div class="hero-slide-content text-center">
                            <img class="slide-img" src="{{ asset('template/mosh/img/bg-img/33.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="mosh-portfolio-area section_padding_100_0 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Produk </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="mosh-projects-menu">
            <div class="text-center portfolio-menu">
                <p class="active" data-filter="*">All</p>
                <p data-filter=".gd">Cotton Combed & Cotton Carded</p>
                <p data-filter=".bi">Lacoste</p>
                <p data-filter=".pho">Babyterry</p>
                <p data-filter=".wd">Misty two tone</p>
                <p data-filter=".pc">Cotton Slub</p>
            </div>
        </div>

        <div class="mosh-portfolio">
            <!-- Single gallery Item Start -->
            <div class="single_gallery_item gd">
                <img class="slide-img" src="{{ asset('template/mosh/img/portfolio-img/produk/1.jpg')}}" alt="">
                <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                    <div class="port-hover-text text-center">
                        <h4>Combad&Carded</h4>
                    </div>
                </div>
            </div>
            <!-- Single gallery Item Start -->
            <div class="single_gallery_item gd">
                <img class="slide-img" src="{{ asset('template/mosh/img/portfolio-img/produk/2.jpg')}}" alt="">
                <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                    <div class="port-hover-text text-center">
                        <h4>Combad&Carded</h4>
                        <a href="#">produk</a>
                    </div>
                </div>
            </div>
            <div class="mosh-portfolio">
                <!-- Single gallery Item Start -->
                <div class="single_gallery_item gd">
                    <img class="slide-img" src="{{ asset('template/mosh/img/portfolio-img/produk/11.jpg')}}" alt="">
                    <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                        <div class="port-hover-text text-center">
                            <h4>Combad&Carded</h4>
                        </div>
                    </div>
                </div>
                <!-- Single gallery Item Start 
                <div class="single_gallery_item gd">
                    <img class="slide-img" src="{{ asset('template/mosh/img/portfolio-img/produk/10.jpg')}}" alt="">
                    <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                        <div class="port-hover-text text-center">
                            <h4>Combad&Carded</h4>
                            <a href="#">produk</a>
                        </div>
                    </div>
                </div> -->

                <!-- Single gallery Item Start -->
                <div class="single_gallery_item bi">
                    <img class="slide-img" src="{{ asset('template/mosh/img/portfolio-img/produk/3.jpg')}}" alt="">
                    <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                        <div class="port-hover-text text-center">
                            <h4>Beby Terry</h4>
                            <a href="#">Produk</a>
                        </div>
                    </div>
                </div>
                <!-- Single gallery Item Start -->
                <div class="single_gallery_item bi">
                    <img class="slide-img" src="{{ asset('template/mosh/img/portfolio-img/produk/4.jpg')}}" alt="">
                    <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                        <div class="port-hover-text text-center">
                            <h4>BebbyTerry</h4>
                            <a href="#">Produk</a>
                        </div>
                    </div>
                </div>
                <!-- Single gallery Item Start -->
                <div class="single_gallery_item pho">
                    <img class="slide-img" src="{{ asset('template/mosh/img/portfolio-img/produk/5.jpg')}}" alt="">
                    <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                        <div class="port-hover-text text-center">
                            <h4>Misty Two Tone</h4>
                            <a href="#">Brand Identity</a>
                        </div>
                    </div>
                </div>
                <!-- Single gallery Item Start -->
                <div class="single_gallery_item pc pho">
                    <img class="slide-img" src="{{ asset('template/mosh/img/portfolio-img/produk/6.jpg')}}" alt="">
                    <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                        <div class="port-hover-text text-center">
                            <h4>Misty Two Tone</h4>
                            <a href="#">Brand Identity</a>
                        </div>
                    </div>
                </div>
                <!-- Single gallery Item Start -->
                <div class="single_gallery_item wd">
                    <img class="slide-img" src="{{ asset('template/mosh/img/portfolio-img/produk/7.jpg')}}" alt="">
                    <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                        <div class="port-hover-text text-center">
                            <h4>Cotton Slub</h4>
                            <a href="#">Produk</a>
                        </div>
                    </div>
                </div>
                <!-- Single gallery Item Start -->
                <div class="single_gallery_item pc pho">
                    <img class="slide-img" src="{{ asset('template/mosh/img/portfolio-img/produk/8.jpg')}}" alt="">
                    <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                        <div class="port-hover-text text-center">
                            <h4>Cotton Slub</h4>
                            <a href="#">Produk</a>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </section>
@endsection
