@extends('layouts.home.app')

@push('style')
    <style>
        .contact-form-area .form-control {
            font-size: 12px;
            color: #545664;
            padding: 5px 15px 15px 15px;

        }
        .single-team-slide{
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            padding-top: 50px;
        }
        .contact-form-area textarea.form-control {
            height: auto;
        }

        .contact-form-area .form-control-label {
            font-size: 13px;
            padding: 15px 15px 0 15px;
            color: #25499e;
            margin-bottom: 0;
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <!-- Breadcumb -->
    <div class="mosh-breadcumb-area"
         style="background-image: url({{ asset('template/mosh/img/core-img/breadcumb.png')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumbContent">
                        <h2>{{ __('My Profile') }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">{{ __('Beranda') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('My Profile') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content -->
    <section class="contact-area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="contact-form-area">
                        <h2>{{ $user->name ?? '' }}</h2>
                        <form action="{{ route('user.store') }}" method="post">
                            @csrf
                            <!-- Form Personal -->
                            <h5>Data Personal</h5><hr>
                            @include('user._form_personal')
                            <br>
                            <!-- Form Study -->
                            <h5>Data Educations</h5><hr>
                            @include('user._form_educations')
                            <br>
                            <br>
                            <!-- Form Experience -->
                            <h5>Data Experience</h5><hr>
                            @include('user._form_work_experience')
                            <div class="row osh-buttons-area">
                                <button class="btn mosh-btn mt-30" style="cursor: pointer;" type="submit">{{ __('Update Profile') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Contact Information -->
                <div class="col-12 col-md-4">
                    <div class="contact-information">
                        <div class="single-contact-info d-flex">
                            <div class="single-team-slide text-center">
                                <div class="team-thumbnail">
{{--                                    <img src="{{ asset('template/mosh/img/bg-img/c-1.jpg') }}" alt="">--}}
                                    <img src="{{ $user->avatar }}" alt="">
                                </div>
                                <div class="team-meta-info">
                                    <h4>{{ $user->name ?? '' }}</h4>
{{--                                    <span>CEO Company</span>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
