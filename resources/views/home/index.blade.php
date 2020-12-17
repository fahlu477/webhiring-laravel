@extends('layouts.home.app')

@section('content')
    @include('home._welcome')
    <section class="mosh-service-area clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mosh-service-slides owl-carousel">
                        <!-- Single Service Area -->
                        <div class="single-service-area text-center">
                            <h2>01.</h2>
                            <h4>Kualitas Tinggi!</h4>
                            <p>Menghasilkan kain yang berkualitas tinggi</p>
                        </div>
                        <!-- Single Service Area -->
                        <div class="single-service-area text-center">
                            <h2>02.</h2>
                            <h4>Pelayanan Prima</h4>
                            <p>Selalu meningkatkan kepuasan pelanggan melalui peningkatan kualitas produk dan pelayanan
                            </p>
                        </div>
                        <!-- Single Service Area -->
                        <div class="single-service-area text-center">
                            <h2>03.</h2>
                            <h4>Mesin Produksi Canggih</h4>
                            <p>
                                Penggunaan mesin yang modern menjamin kestabilan kualitas, lead time yang singkat dan
                                pengiriman tepat waktu.
                            </p>
                        </div>
                        <!-- Single Service Area -->
                        <div class="single-service-area text-center">
                            <h2>04.</h2>
                            <h4>Jaringan Distribusi</h4>
                            <p>Jaringan Distribusi yang Luas Hingga ke Retail</p>
                        </div>
                        <!-- Single Service Area -->
                    </div>
                </div>
    </section>

    <section class="mosh-more-services-area d-sm-flex justify-content-center">
        <div class="single-more-service-area justify-content-center">
            <div class="more-service-content text-center wow fadeInUp" data-wow-delay=".1s">
                <img src="{{ asset('template/mosh/img/bg-img/mmm.png') }}" alt="">
                <h4>Gambaran Umum Perusahaan</h4>
                <p>
                    PT. Kamarga Kurnia telah didedikasikan untuk memproduksi dan manufaktur kain berkualitas paling
                    tinggi di pasaran.
                    Komitmen kami terhadap kualitas, inovasi, dan proses telah membuat perusahaan kami menjadi salah
                    satu yang terbaik di Indonesia.
                </p>
            </div>
        </div>
        <div class="single-more-service-area">
            <div class="more-service-content text-center wow fadeInUp" data-wow-delay=".4s">
                <img src="{{ asset('template/mosh/img/bg-img/fac.png') }}" alt="">
                <h4>Gamabaran Produk Perusahaan</h4>
                <p>Produk yang dihasilkan oleh perusahaan , dan fasilitas yang terdapat di perusahaan </p>
            </div>
        </div>
        <div class="single-more-service-area">
            <div class="more-service-content text-center wow fadeInUp" data-wow-delay=".7s">
                <img src="{{ asset('template/mosh/img/bg-img/abc.png') }}" alt="">
                <h4>Info Lowongan Pekerjaan</h4>
                <p>Semua Informasi Lowongan pekerjaan yang terdapat dalam Perusahaan</p>
            </div>
        </div>
        <div class="single-more-service-area">
            <div class="more-service-content text-center wow fadeInUp" data-wow-delay="1s">
                <img src="{{ asset('template/mosh/img/bg-img/mesin.png') }}" alt="">
                <h4>Apa yang Dapat Kami Bantu??</h4>
                <p></p>
            </div>
        </div>
    </section>
@endsection
