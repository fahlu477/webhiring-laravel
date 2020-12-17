@extends('layouts.home.app')

@include('kontak._welcome')

@section('content')
@endsection
 <!-- ***** Contact Area Start ***** -->
    <section class="contact-area section_padding_100">
        <div class="container">
            <div class="row">
                <!-- Contact Form Area -->
                <div class="col-12 col-md-8">
                    <div class="contact-form-area">
                        <h2>Apa Yang Bisa Kami Bantu?</h2>
                        <form action="#">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <input type="text" class="form-control" id="name" placeholder="Name">
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="email" class="form-control" id="email" placeholder="E-mail">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                <button class="btn mosh-btn mt-50" type="submit">Send Message</button>
                            </div>
                        </form>
                        </form>
                         </div>
                </div>
                <!-- Contact Information -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-100">
                        <h5>Contact Info</h5>
                        <div class="footer-single-contact-info d-flex">
                            <div class="contact-icon">
                                <img src="{{ asset('template/mosh/img/core-img/map.png') }}" alt="">
                            </div>
                            <p>Jl. Mancong No.249, Melong, Kec. Cimahi Sel., Kota Cimahi, Jawa Barat</p>
                        </div>
                        <div class="footer-single-contact-info d-flex">
                            <div class="contact-icon">
                                <img src="{{ asset('template/mosh/img/core-img/call.png') }}" alt="">
                            </div>
                            <p>Phone (022) 6031410 <br> Fax (022) 6031527</p>
                        </div>
                        <div class="footer-single-contact-info d-flex">
                            <div class="contact-icon">
                                <img src="{{ asset('template/mosh/img/core-img/message.png') }}" alt="">
                            </div>
                            <p>info@kamargakurnia.com</p>
                        </div>
                            <div class="contact-social-info mt-50">
                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </section>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6597.396875605818!2d107.5440221777732!3d-6.9164855819147775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e593297be93b%3A0xeb3cd6bd1b281080!2sPt.kamarga%20Kurniatex!5e0!3m2!1sid!2sid!4v1567085280089!5m2!1sid!2sid" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="">
            </iframe>
    

