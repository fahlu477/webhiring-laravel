@extends('layouts.home.app')

@section('content')
    @include('career._breadcumb')
    <section class="blog-area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="mosh-blog-posts">
                        <div class="row">
                            @foreach($jobs as $job)
                                <div class="col-12">
                                    <div class="single-blog wow fadeInUp" data-wow-delay="0.7s">
                                        <h2>{{ $job->name }}</h2>
                                        <div class="post-meta">
                                            <h6>
                                                {{ $job->function }},
                                                <a href="#">{{ $job->openFormat }} s/d {{ $job->closeFormat }}</a>
                                            </h6>
                                        </div>
                                        <p>
                                            {{ str_limit(strip_tags($job->description), 300) }}
                                        </p>
                                        <a href="{{ route('career.show', $job->id) }}">Read More</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mosh-pagination-area">
                        <nav>
                            <ul class="pagination">
                                {{ $jobs->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
                @include('career._sidebar')
            </div>
        </div>
    </section>
@endsection
