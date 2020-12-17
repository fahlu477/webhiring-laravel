@extends('layouts.home.app')

@section('content')
    @include('career._breadcumb', ['title' => 'Detail Lowongan Pekerjaan'])

    <section class="mosh-about-features-area section_padding_100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-12">
                    <div class="mosh-about-us-content">
                        <div class="section-heading">
                            <p>{{ $job->function }}</p>
                            <h2>{{ $job->name }}</h2>
                        </div>
                        <h5>Persyaratan</h5>
                        <hr>
                        <p>
                            Program Study : {{ $job->ProgramStudyName }} <br>
                            Position : {{ $job->ExperienceName }} <br>
                            Education : {{ $job->EducationName }} <br>
                            Age : {{ $job->minimum_age }} - {{ $job->maximum_age }} year<br>
                            Open Job : {{ $job->openFormat }} s/d {{ $job->closeFormat }}<br>
                        </p>
                        <br>
                        <h5>Deskripsi</h5>
                        <hr>
                        <p style="text-align: justify;text-justify: inter-word;">
                            {!! $job->description !!}
                        </p>
                        <a href="{{ route('user.apply', ['job_id' => $job->id]) }}" class="btn mosh-btn mt-50">Apply Now</a>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mosh-about-us-thumb wow fadeInUp" data-wow-delay="0.5s"></div>
                </div>
            </div>
        </div>
    </section>

@endsection
