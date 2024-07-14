@extends('web.layout')

@section('content')
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">
                {{ $blog->title }}
            </h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-4">
                    <img alt="{{ $blog->title }}" class="img-fluid" src="{{ asset('Blog/' . $blog->image) }}">
                </div>
                <div class="col-md-6">
                    <p>
                        {!! $blog->konten !!}
                    </p>
                </div>
            </div>

        </div>
    </section>
@endsection
