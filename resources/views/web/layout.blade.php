<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <title>PUSKESMAS LUBUKJAMBI</title>
    <!-- Favicon-->
    <link href="assets/favicon.ico" rel="icon" type="image/x-icon" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('web/css/styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">PUSKESMAS LUBUKJAMBI</a>
            <button aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded"
                data-bs-target="#navbarResponsive" data-bs-toggle="collapse" type="button">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#contact">Kontak</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="/login">Login</a></li>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center"
        style="background-image: url('https://scontent-cgk1-1.xx.fbcdn.net/v/t1.6435-9/46459432_594792344285995_7880442832635297792_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=25d718&_nc_eui2=AeEyReYh8yZA4WX9PgRb_sqGq4Msh_Z7OH6rgyyH9ns4fsrkMatxxYW00fbtwewYDWQU4r-wnpnMc6pcjIAuev4Y&_nc_ohc=uVL9Fo3veCIQ7kNvgGXVFMd&_nc_ht=scontent-cgk1-1.xx&oh=00_AYAmMicbWthyGOOfvQOanBHGm1_ELo9VNbaCGp9HI9Wn8w&oe=66BB1346')">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            {{-- <img alt="..." class="masthead-avatar mb-5" src="assets/img/avataaars.svg" /> --}}
            <!-- Masthead Heading-->
            {{-- <h1 class="masthead-heading text-uppercase mb-0"></h1> --}}
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">Sistem Informasi Monitoring Anak</p>
        </div>
    </header>

    @yield('content')
    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Location</h4>
                    <p class="lead mb-0">
                        8FP8+X85, Unnamed Road, Lubuk Jambi, Kec. Kuantan Mudik, Kabupaten Kuantan Singingi, Riau 29564
                    </p>
                </div>

            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; puskesmas lubukjambi 2024</small></div>
    </div>
    <!-- Portfolio Modals-->
    <!-- Portfolio Modal 1-->
    <div aria-hidden="true" aria-labelledby="portfolioModal1" class="portfolio-modal modal fade" id="portfolioModal1"
        tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0"><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"
                        type="button"></button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Log Cabin</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img alt="..." class="img-fluid rounded mb-5"
                                    src="assets/img/portfolio/cabin.png" />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia
                                    neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore
                                    quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur
                                    itaque. Nam.</p>
                                <button class="btn btn-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-xmark fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('web/js/scripts.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
