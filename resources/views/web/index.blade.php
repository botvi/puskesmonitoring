@extends('web.layout')
@section('content')
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">BERITA</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">

                @foreach ($berita as $item)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <a class="portfolio-item mx-auto" href="{{ url('beritas/' . $item->id) }}"
                            style="text-decoration: none; color:#2c3e50">
                            <div
                                class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i
                                        class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img alt="..." class="img-fluid" src="{{ asset('Blog/' . $item->image) }}"
                                style="width: 100%; height: 250px" />
                            <h5>{{ $item->title }}</h5>
                            <p>{{ $item->deskripsi }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0" id="about">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">Tentang</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
            <div class="row">
                <div class="col-lg-4 ms-auto">
                    <p></p>
                </div>
                <div class="col-lg-4 me-auto">
                    <p></p>
                </div>
            </div>
        </div>
    </section>
@endsection
