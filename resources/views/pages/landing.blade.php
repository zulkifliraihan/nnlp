<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Title -->
  <title>LPKN | Seminar Gratis</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset("favicon.ico") }}">

  <!-- Google Fonts -->
  <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="{{ asset("pron/vendor/font-awesome/css/fontawesome-all.min.css")}}">
  <link rel="stylesheet" href="{{ asset("pron/vendor/animate.css/animate.min.css")}}">
  <link rel="stylesheet" href="{{ asset("pron/vendor/hs-megamenu/src/hs.megamenu.css")}}">
  <link rel="stylesheet" href="{{ asset("pron/vendor/fancybox/jquery.fancybox.css")}}">
  <link rel="stylesheet" href="{{ asset("pron/vendor/slick-carousel/slick/slick.css")}}">
  <link rel="stylesheet" href="{{ asset("pron/vendor/cubeportfolio/css/cubeportfolio.min.css")}}">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="{{ asset("pron/css/theme.css")}}">
</head>
<body>
  <!-- ========== HEADER ========== -->
  <header id="header" class="u-header u-header-center-aligned-nav u-header--bg-transparent u-header--white-nav-links-md u-header--sub-menu-dark-bg-md u-header--abs-top mt-3"
          data-header-fix-moment="500"
          data-header-fix-effect="slide">
    <div class="u-header__section">
      <div id="logoAndNav" class="container">
        <!-- Nav -->
        <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space">
          <div class="u-header-center-aligned-nav__col">
            <!-- Logo -->
            <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center u-header__navbar-brand-text-white" href="index.html" aria-label="Front">
              <span class="u-header__navbar-brand-text">LP<span class="text-danger">K</span>N</span>
            </a>
            <!-- End Logo -->

            <!-- Responsive Toggle Button -->
            {{-- <button type="button" class="navbar-toggler btn u-hamburger u-hamburger--white"
                    aria-label="Toggle navigation"
                    aria-expanded="false"
                    aria-controls="navBar"
                    data-toggle="collapse"
                    data-target="#navBar">
              <span id="hamburgerTrigger" class="u-hamburger__box">
                <span class="u-hamburger__inner"></span>
              </span>
            </button> --}}
            <!-- End Responsive Toggle Button -->
          </div>

          <!-- Last Item -->
          <div class="u-header-center-aligned-nav__col u-header-center-aligned-nav__col-last-item ml-auto">
            @if(session("lpkn_ref_email"))
                <a class="btn btn-sm btn-primary transition-3d-hover" href="{{ route('referral.pendaftaran') }}">
                    Referral Saya
                </a>
            @else
                <a class="btn btn-sm btn-primary transition-3d-hover" href="#footer">
                    Daftar Sekarang
                </a>
            @endif
          </div>
          <!-- End Last Item -->
        </nav>
        <!-- End Nav -->
      </div>
    </div>
  </header>
  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN ========== -->
  <main id="content" role="main">
    <!-- Hero v1 Section -->
    <div class="u-hero-v1">
      <!-- Hero Carousel Main -->
      <div id="heroNav" class="js-slick-carousel u-slick"
           data-autoplay="true"
           data-speed="10000"
           data-adaptive-height="true"
           data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
           data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
           data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
           data-numbered-pagination="#slickPaging"
           data-nav-for="#heroNavThumb">
        <div class="js-slide">
          <!-- Slide #1 -->
          <div class="d-lg-flex align-items-lg-center u-hero-v1__main" style="background-image: url({{ asset("pron/img/1920x800/img2.jpg")}});">
            <div class="container space-3 space-top-md-5 space-top-lg-3">
              <div class="row">
                <div class="col-md-8 col-lg-9 position-relative">
                  <span class="d-block h4 text-white font-weight-light mb-2"
                        data-scs-animation-in="fadeInUp">
                    Acara Gratis
                  </span>
                  <h1 class="text-white display-4 font-size-md-down-5 mb-0"
                      data-scs-animation-in="fadeInUp"
                      data-scs-animation-delay="200">
                    Seminar membangun <span class="font-weight-semi-bold">Ekonomi & Keuangan</span> Digital Indonesia Tahun 2025
                  </h1>
                </div>
              </div>
            </div>
          </div>
          <!-- End Slide #1 -->
        </div>

        {{-- <div class="js-slide">
          <!-- Slide #2 -->
          <div class="d-lg-flex align-items-lg-center u-hero-v1__main" style="background-image: url({{ asset("pron/img/1920x800/img3.jpg")}});">
            <div class="container space-3 space-top-md-5 space-top-lg-3">
              <div class="row">
                <div class="col-md-8 col-lg-6">
                  <span class="d-block h4 text-white font-weight-light mb-2"
                        data-scs-animation-in="fadeInUp">
                    It is an
                  </span>
                  <h2 class="text-white display-4 font-size-md-down-5 mb-0"
                      data-scs-animation-in="fadeInUp"
                      data-scs-animation-delay="200">
                    <span class="font-weight-semi-bold">Easy</span> business with Front template
                  </h2>
                </div>
              </div>
            </div>
          </div>
          <!-- End Slide #2 -->
        </div> --}}
      </div>
      <!-- End Hero Carousel Main -->

      <!-- Slick Paging -->
      <div class="container position-relative">
        <div id="slickPaging" class="u-slick__paging"></div>
      </div>
      <!-- End Slick Paging -->

      <!-- Hero Carousel Secondary -->
      <div id="heroNavThumb" class="js-slick-carousel u-slick"
           data-autoplay="true"
           data-speed="10000"
           data-is-thumbs="true"
           data-nav-for="#heroNav">
        <div class="js-slide">
          <!-- Slide #1 -->
          <div class="d-flex align-items-center bg-white u-hero-v1__secondary">
            <div class="container space-2">
              <div class="row">
                <div class="col-lg-6">
                  <h2 class="text-muted">
                    <span class="d-block">Pendaftaran berakhir pada</span>
                    <span class="d-block text-primary" id="countdown"></span>
                  </h2>
                  {{-- <p class="mb-0">Modify any aspect of your website or pages with Front.</p> --}}
                </div>
              </div>
            </div>

            <div class="w-100 h-100 d-none d-lg-inline-block bg-primary u-hero-v1__last">
              <div class="u-hero-v1__last-inner">
                <h3 class="h3 text-white">
                  <strong>Jumlah peserta:</strong> <br>
                  <span>{{ isset($total_user) ? number_format($total_user, 0 ,".", ",") : 0 }} orang</span>
                </h3>
                {{-- <p class="text-white-70 mb-0">Let visitors to view your content from their choice of device.</p> --}}
              </div>
            </div>
          </div>
          <!-- End Slide #1 -->
        </div>

        {{-- <div class="js-slide">
          <!-- Slide #2 -->
          <div class="d-flex align-items-center bg-white u-hero-v1__secondary">
            <div class="container space-2">
              <div class="row">
                <div class="col-lg-4">
                  <h3 class="h5 text-muted">
                    <strong class="d-block">02.</strong>
                    <span class="d-block text-danger">Fully responsive</span>
                  </h3>
                  <p class="mb-0">Let visitors to view your content from their choice of device.</p>
                </div>
              </div>
            </div>

            <div class="w-100 h-100 d-none d-lg-inline-block bg-danger u-hero-v1__last">
              <div class="u-hero-v1__last-inner">
                <h3 class="h5 text-white">
                  <strong class="u-hero-v1__last-prev">Prev:</strong> Advanced editing
                </h3>
                <p class="text-white-70 mb-0">Modify any aspect of your website with Front</p>
              </div>
            </div>
          </div>
          <!-- End Slide #2 -->
        </div> --}}
      </div>
      <!-- End Hero Carousel Secondary -->
    </div>
    <!-- End Hero v1 Section -->

    <hr class="my-0">

    <!-- Front in Frames Section -->
    <div class="overflow-hidden">
      <div class="container space-2 space-md-3">
        <div class="row justify-content-between align-items-center">
          <div class="col-lg-5 mb-7 mb-lg-0">
            <div class="pr-md-4">
              <!-- Title -->
              <div class="mb-7">
                <span class="u-label u-label--sm u-label--success mb-2">Tentang seminar</span>
                <h2 class="text-primary">Ekonomi & Keuangan <span class="font-weight-semi-bold">digital</span></h2>
                <p>Bersiaplah dengan digitalisasi ekonomi dan keuangan di Indonesia pada 2025.</p>
                <p>Pelajari keahlian-keahlian digital yang dapat membantu anda menjadi pribadi yang lebih sukses dalam perkembangan ekonomi dan keuangan digital di Indonesia dan mancanegara.</p>
              </div>
              <!-- End Title -->

              @if(!session("lpkn_ref_email"))
                <a class="btn btn-sm btn-primary btn-wide transition-3d-hover" href="#footer">Daftar Sekarang <span class="fas fa-angle-right ml-2"></span></a>
              @endif
            </div>
          </div>

          <div class="col-lg-6 position-relative">
            <!-- Image Gallery -->
            <div class="row mx-gutters-2">
              <div class="col-5 align-self-end px-2 mb-3">
                <!-- Fancybox -->
                <a class="js-fancybox u-media-viewer" href="javascript:;"
                   data-src="{{ asset("pron/img/1920x1080/img2.jpg")}}"
                   data-fancybox="lightbox-gallery-hidden"
                   data-caption="Front in frames - image #01"
                   data-speed="700">
                  <img class="img-fluid rounded" src="{{ asset("pron/img/320x320/img1.jpg")}}" alt="Image Description">

                  <span class="u-media-viewer__container">
                    <span class="u-media-viewer__icon">
                      <span class="fas fa-plus u-media-viewer__icon-inner"></span>
                    </span>
                  </span>
                </a>
                <!-- End Fancybox -->
              </div>

              <div class="col-7 px-2 mb-3">
                <!-- Fancybox -->
                <a class="js-fancybox u-media-viewer" href="javascript:;"
                   data-src="{{ asset("pron/img/1920x1080/img4.jpg")}}"
                   data-fancybox="lightbox-gallery-hidden"
                   data-caption="Front in frames - image #02"
                   data-speed="700">
                  <img class="img-fluid rounded" src="{{ asset("pron/img/450x450/img1.jpg")}}" alt="Image Description">

                  <span class="u-media-viewer__container">
                    <span class="u-media-viewer__icon">
                      <span class="fas fa-plus u-media-viewer__icon-inner"></span>
                    </span>
                  </span>
                </a>
                <!-- End Fancybox -->
              </div>

              <div class="col-5 offset-1 px-2 mb-3">
                <!-- Fancybox -->
                <a class="js-fancybox u-media-viewer" href="javascript:;"
                   data-src="{{ asset("pron/img/1920x1920/img1.jpg")}}"
                   data-fancybox="lightbox-gallery-hidden"
                   data-caption="Front in frames - image #03"
                   data-speed="700">
                  <img class="img-fluid rounded" src="{{ asset("pron/img/280x310/img1.jpg")}}" alt="Image Description">

                  <span class="u-media-viewer__container">
                    <span class="u-media-viewer__icon">
                      <span class="fas fa-plus u-media-viewer__icon-inner"></span>
                    </span>
                  </span>
                </a>
                <!-- End Fancybox -->
              </div>

              <div class="col-5 px-2 mb-3">
                <!-- Fancybox -->
                <a class="js-fancybox u-media-viewer" href="javascript:;"
                   data-src="{{ asset("pron/img/1920x1080/img3.jpg")}}"
                   data-fancybox="lightbox-gallery-hidden"
                   data-caption="Front in frames - image #04"
                   data-speed="700">
                  <img class="img-fluid rounded" src="{{ asset("pron/img/300x180/img1.jpg")}}" alt="Image Description">

                  <span class="u-media-viewer__container">
                    <span class="u-media-viewer__icon">
                      <span class="fas fa-plus u-media-viewer__icon-inner"></span>
                    </span>
                  </span>
                </a>
                <!-- End Fancybox -->
              </div>
            </div>
            <!-- End Image Gallery -->

            <!-- SVG Background Shape -->
            <div id="SVGbgShapeID1" class="svg-preloader w-100 content-centered-y z-index-n1">
              <figure class="ie-soft-triangle-shape">
                <img class="js-svg-injector" src="{{ asset("pron/svg/components/soft-triangle-shape.svg")}}" alt="Image Description"
                     data-parent="#SVGbgShapeID1">
              </figure>
            </div>
            <!-- End SVG Background Shape -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Front in Frames Section -->

    <!-- Devices v2 Section -->
    <div id="SVGSubscribe" class="svg-preloader bg-primary u-devices-v2">
      <div class="container space-2 space-md-3 position-relative z-index-2">
        <!-- Title -->
        <div class="w-md-80 w-lg-50 text-center mx-md-auto">
          <span class="btn btn-lg btn-icon btn-white rounded-circle mb-4">
            <span class="fas fa-house-damage text-primary btn-icon__inner"></span>
          </span>
          <h2 class="h1 text-white">Stay <span class="font-weight-semi-bold">at</span> Home</h2>
          <p class="lead text-white mb-0">Anda tidak perlu ke luar rumah karena seminar dilaksanakan secara daring.</p>
        </div>
        <!-- End Title -->
      </div>

      <!-- Devices v2 -->
      <div class="d-none d-lg-block">
        <!-- SVG Tablet Mockup -->
        <div class="u-devices-v2__tablet">
          <div class="w-75 u-devices-v2__tablet-svg">
            <figure class="ie-devices-v2-tablet">
              <img class="js-svg-injector" src="{{ asset("pron/svg/components/tablet.svg")}}" alt="Image Description"
                   data-img-paths='[
                     {"targetId": "#SVGtabletImg1", "newPath": "{{ asset("pron/img/282x500/img1.jpg")}}"}
                   ]'
                   data-parent="#SVGSubscribe">
            </figure>
          </div>
        </div>
        <!-- End SVG Tablet Mockup -->

        <!-- SVG Phone Mockup -->
        <div class="u-devices-v2__phone">
          <div class="w-75 u-devices-v2__phone-svg">
            <figure class="ie-devices-v2-iphone">
              <img class="js-svg-injector" src="{{ asset("pron/svg/components/iphone.svg")}}" alt="Image Description"
                   data-img-paths='[
                     {"targetId": "#SVGiphoneImg1", "newPath": "{{ asset("pron/img/282x500/img1.jpg")}}"}
                   ]'
                   data-parent="#SVGSubscribe">
            </figure>
          </div>
        </div>
        <!-- End SVG Phone Mockup -->
      </div>
      <!-- End Devices v2 -->

      <!-- SVG Background Shape -->
      <figure class="w-100 content-centered-y position-absolute right-0 bottom-0">
        <img class="js-svg-injector" src="{{ asset("pron/svg/components/process-pointer-1.svg")}}" alt="Image Description"
             data-parent="#SVGSubscribe">
      </figure>
      <!-- End SVG Background Shape -->
    </div>
    <!-- End Devices v2 Section -->

    <!-- Team Section -->
    <div class="container space-top-2 space-top-md-2 text-center" id="daftar_section">
      <!-- Title -->
      <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-9">
        <span class="u-label u-label--sm u-label--success mb-2">LPKN</span>
        <h2 class="text-primary">Segera <span class="font-weight-semi-bold">Mendaftar</span></h2>
        <p>Ayo kembangkan diri Anda</p>
      </div>
      <!-- End Title -->

      @if(!session("lpkn_ref_email"))
      <div class="row">
          <div class="col-md-8 offset-md-2">
            <form id="acaraForm" action="{{ route("acara.daftar") }}" method="POST">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Nama Lengkap</label>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-user text-dark"></i></span>
                            </div>
                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Email address</label>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-envelope-open text-dark"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control" placeholder="user@example.com">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">No. Handphone</label>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-phone text-dark"></i></span>
                            </div>
                            <input type="text" name="no_hp" class="form-control" placeholder="0821...">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Instansi</label>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-building text-dark"></i></span>
                            </div>
                            <input type="text" name="nama_instansi" class="form-control" placeholder="Masukkan Lembaga">
                        </div>
                    </div>
                    @isset($ref)
                    <div class="form-group col-6 d-none">
                        <label for="exampleFormControlInput1">Referral</label>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-building text-dark"></i></span>
                            </div>
                            <input type="text" name="ref" value="{{ $ref }}" class="form-control" id="ref_field">
                        </div>
                    </div>
                    @endisset
                </div>
                @isset($ref)
                    <span>Referral: <span class="text-primary">{{$ref}}</span></span>
                @endisset
                <button type="submit" class="btn btn-primary btn-sm float-right">Daftar</button>
              </form>
          </div>
      </div>
      @else
        <a class="btn btn-sm btn-primary transition-3d-hover text-center mb-5" href="{{ route('referral.pendaftaran') }}">
            Referral Saya
        </a>
      @endif
      {{-- <!-- Slick Carousel -->
      <div class="js-slick-carousel u-slick u-slick--gutters-3"
           data-slides-show="2"
           data-slides-scroll="1"
           data-pagi-classes="text-center u-slick__pagination mt-7 mb-0"
           data-responsive='[{
             "breakpoint": 992,
             "settings": {
               "slidesToShow": 1
             }
           }, {
             "breakpoint": 768,
             "settings": {
               "slidesToShow": 1
             }
           }, {
             "breakpoint": 554,
             "settings": {
               "slidesToShow": 1
             }
           }]'>
        <div class="js-slide px-3">
          <!-- Team -->
          <div class="row">
            <div class="col-sm-6 d-sm-flex align-content-sm-start flex-sm-column text-center text-sm-left mb-7 mb-sm-0">
              <div class="w-100">
                <h3 class="h5 mb-4">Maria Muszynska</h3>
              </div>
              <div class="d-inline-block">
                <span class="badge badge-primary badge-pill badge-bigger mb-3">#maria</span>
              </div>
              <p class="font-size-1">I am an ambitious workaholic, but apart from that, pretty simple person.</p>

              <!-- Social Networks -->
              <ul class="list-inline mt-auto mb-0">
                <li class="list-inline-item mx-0">
                  <a class="btn btn-sm btn-icon btn-soft-secondary" href="#">
                    <span class="fab fa-facebook-f btn-icon__inner"></span>
                  </a>
                </li>
                <li class="list-inline-item mx-0">
                  <a class="btn btn-sm btn-icon btn-soft-secondary" href="#">
                    <span class="fab fa-google btn-icon__inner"></span>
                  </a>
                </li>
                <li class="list-inline-item mx-0">
                  <a class="btn btn-sm btn-icon btn-soft-secondary" href="#">
                    <span class="fab fa-twitter btn-icon__inner"></span>
                  </a>
                </li>
              </ul>
              <!-- End Social Networks -->
            </div>
            <div class="col-sm-6">
              <img class="img-fluid rounded mx-auto" src="{{ asset("pron/img/350x400/img1.jpg")}}" alt="Image Description">
            </div>
          </div>
          <!-- End Team -->
        </div>

        <div class="js-slide px-3">
          <!-- Team -->
          <div class="row">
            <div class="col-sm-6 d-sm-flex align-content-sm-start flex-sm-column text-center text-sm-left mb-7 mb-sm-0">
              <div class="w-100">
                <h3 class="h5 mb-4">Jack Wayley</h3>
              </div>
              <div class="d-inline-block">
                <span class="badge badge-primary badge-pill badge-bigger mb-3">#jack</span>
              </div>
              <p class="font-size-1">I am an ambitious workaholic, but apart from that, pretty simple person.</p>

              <!-- Social Networks -->
              <ul class="list-inline mt-auto mb-0">
                <li class="list-inline-item mx-0">
                  <a class="btn btn-sm btn-icon btn-soft-secondary" href="#">
                    <span class="fab fa-facebook-f btn-icon__inner"></span>
                  </a>
                </li>
                <li class="list-inline-item mx-0">
                  <a class="btn btn-sm btn-icon btn-soft-secondary" href="#">
                    <span class="fab fa-google btn-icon__inner"></span>
                  </a>
                </li>
                <li class="list-inline-item mx-0">
                  <a class="btn btn-sm btn-icon btn-soft-secondary" href="#">
                    <span class="fab fa-twitter btn-icon__inner"></span>
                  </a>
                </li>
              </ul>
              <!-- End Social Networks -->
            </div>
            <div class="col-sm-6">
              <img class="img-fluid rounded mx-auto" src="{{ asset("pron/img/350x400/img2.jpg")}}" alt="Image Description">
            </div>
          </div>
          <!-- End Team -->
        </div>

        <div class="js-slide px-3">
          <!-- Team -->
          <div class="row">
            <div class="col-sm-6 d-sm-flex align-content-sm-start flex-sm-column text-center text-sm-left mb-7 mb-sm-0">
              <div class="w-100">
                <h3 class="h5 mb-4">Emmely Jackson</h3>
              </div>
              <div class="d-inline-block">
                <span class="badge badge-primary badge-pill badge-bigger mb-3">#emmely</span>
              </div>
              <p class="font-size-1">I am an ambitious workaholic, but apart from that, pretty simple person.</p>

              <!-- Social Networks -->
              <ul class="list-inline mt-auto mb-0">
                <li class="list-inline-item mx-0">
                  <a class="btn btn-sm btn-icon btn-soft-secondary" href="#">
                    <span class="fab fa-facebook-f btn-icon__inner"></span>
                  </a>
                </li>
                <li class="list-inline-item mx-0">
                  <a class="btn btn-sm btn-icon btn-soft-secondary" href="#">
                    <span class="fab fa-google btn-icon__inner"></span>
                  </a>
                </li>
                <li class="list-inline-item mx-0">
                  <a class="btn btn-sm btn-icon btn-soft-secondary" href="#">
                    <span class="fab fa-twitter btn-icon__inner"></span>
                  </a>
                </li>
              </ul>
              <!-- End Social Networks -->
            </div>
            <div class="col-sm-6">
              <img class="img-fluid rounded mx-auto" src="{{ asset("pron/img/350x400/img3.jpg")}}" alt="Image Description">
            </div>
          </div>
          <!-- End Team -->
        </div>

        <div class="js-slide px-3">
          <!-- Team -->
          <div class="row">
            <div class="col-sm-6 d-sm-flex align-content-sm-start flex-sm-column text-center text-sm-left mb-7 mb-sm-0">
              <div class="w-100">
                <h3 class="h5 mb-4">Mark McManus</h3>
              </div>
              <div class="d-inline-block">
                <span class="badge badge-primary badge-pill badge-bigger mb-3">#mark</span>
              </div>
              <p class="font-size-1">I am an ambitious workaholic, but apart from that, pretty simple person.</p>

              <!-- Social Networks -->
              <ul class="list-inline mt-auto mb-0">
                <li class="list-inline-item mx-0">
                  <a class="btn btn-sm btn-icon btn-soft-secondary" href="#">
                    <span class="fab fa-facebook-f btn-icon__inner"></span>
                  </a>
                </li>
                <li class="list-inline-item mx-0">
                  <a class="btn btn-sm btn-icon btn-soft-secondary" href="#">
                    <span class="fab fa-google btn-icon__inner"></span>
                  </a>
                </li>
                <li class="list-inline-item mx-0">
                  <a class="btn btn-sm btn-icon btn-soft-secondary" href="#">
                    <span class="fab fa-twitter btn-icon__inner"></span>
                  </a>
                </li>
              </ul>
              <!-- End Social Networks -->
            </div>
            <div class="col-sm-6">
              <img class="img-fluid rounded mx-auto" src="{{ asset("pron/img/350x400/img4.jpg")}}" alt="Image Description">
            </div>
          </div>
          <!-- End Team -->
        </div>
      </div>
      <!-- End Slick Carousel -->
    </div>
    <!-- End Team Section --> --}}

    {{-- <!-- Blog Grid Section -->
    <div class="bg-light">
      <div class="container space-2 space-md-3">
        <!-- Title -->
        <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-9">
          <span class="u-label u-label--sm u-label--success mb-2">News</span>
          <h2 class="text-primary">Read our <span class="font-weight-semi-bold">news &amp; blogs</span></h2>
          <p>Our duty towards you is to share our experience we're reaching in our work path with you.</p>
        </div>
        <!-- End Title -->

        <!-- News Carousel -->
        <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-2"
             data-slides-show="4"
             data-slides-scroll="1"
             data-pagi-classes="text-center u-slick__pagination mt-7 mb-0"
             data-responsive='[{
               "breakpoint": 1200,
               "settings": {
                 "slidesToShow": 3
               }
             }, {
               "breakpoint": 992,
               "settings": {
                 "slidesToShow": 2
               }
             }, {
               "breakpoint": 768,
               "settings": {
                 "slidesToShow": 2
               }
             }, {
               "breakpoint": 554,
               "settings": {
                 "slidesToShow": 1
               }
             }]'>
          <!-- Blog Grid -->
          <div class="js-slide card border-0 mb-3">
            <div class="card-body p-5">
              <small class="d-block text-muted mb-2">May 15, 2018</small>
              <h2 class="h5">
                <a href="../blog/single-article-classic.html">InVision design forward fund</a>
              </h2>
              <p class="mb-0">Clark Valberg is the founder and CEO of InVision.</p>
            </div>

            <div class="card-footer pb-5 px-0 mx-5">
              <div class="media align-items-center">
                <div class="u-sm-avatar mr-3">
                  <img class="img-fluid rounded-circle" src="{{ asset("pron/img/100x100/img1.jpg")}}" alt="Image Description">
                </div>
                <div class="media-body">
                  <h4 class="small mb-0"><a href="../blog/single-article-classic.html">Andrea Gard</a></h4>
                </div>
              </div>
            </div>
            <!-- End Blog Grid -->
          </div>

          <!-- Blog Grid -->
          <div class="js-slide card border-0 mb-3">
            <div class="card-body p-5">
              <small class="d-block text-muted mb-2">May 30, 2018</small>
              <h3 class="h5">
                <a href="../blog/single-article-classic.html">Design principles</a>
              </h3>
              <p class="mb-0">The biggest collections of design principles on the internet</p>
            </div>

            <div class="card-footer pb-5 px-0 mx-5">
              <div class="media align-items-center">
                <div class="u-sm-avatar mr-3">
                  <img class="img-fluid rounded-circle" src="{{ asset("pron/img/100x100/img2.jpg")}}" alt="Image Description">
                </div>
                <div class="media-body">
                  <h4 class="small mb-0"><a href="../blog/single-article-classic.html">Charlotte Moore</a></h4>
                </div>
              </div>
            </div>
            <!-- End Blog Grid -->
          </div>

          <!-- Blog Grid -->
          <div class="js-slide card border-0 mb-3">
            <div class="card-body p-5">
              <small class="d-block text-muted mb-2">April 1, 2018</small>
              <h3 class="h5">
                <a href="../blog/single-article-classic.html">Touch yourself</a>
              </h3>
              <p class="mb-0">Everyone's are different, and they can even change</p>
            </div>

            <div class="card-footer pb-5 px-0 mx-5">
              <div class="media align-items-center">
                <div class="u-sm-avatar mr-3">
                  <img class="img-fluid rounded-circle" src="{{ asset("pron/img/100x100/img4.jpg")}}" alt="Image Description">
                </div>
                <div class="media-body">
                  <h4 class="small mb-0"><a href="../blog/single-article-classic.html">Scott Levine</a></h4>
                </div>
              </div>
            </div>
            <!-- End Blog Grid -->
          </div>

          <!-- Blog Grid -->
          <div class="js-slide card border-0 mb-3">
            <div class="card-body p-5">
              <small class="d-block text-muted mb-2">April 3, 2018</small>
              <h3 class="h5">
                <a href="../blog/single-article-classic.html">Respect always comes first</a>
              </h3>
              <p class="mb-0">The past years have been remarkable for web technologies.</p>
            </div>

            <div class="card-footer pb-5 px-0 mx-5">
              <div class="media align-items-center">
                <div class="u-sm-avatar mr-3">
                  <img class="img-fluid rounded-circle" src="{{ asset("pron/img/100x100/img1.jpg")}}" alt="Image Description">
                </div>
                <div class="media-body">
                  <h4 class="small mb-0"><a href="../blog/single-article-classic.html">Andrea Gard</a></h4>
                </div>
              </div>
            </div>
            <!-- End Blog Grid -->
          </div>

          <!-- Blog Grid -->
          <div class="js-slide card border-0 mb-3">
            <div class="card-body p-5">
              <small class="d-block text-muted mb-2">April 7, 2018</small>
              <h3 class="h5">
                <a href="../blog/single-article-classic.html">5 basic tips for illustrating</a>
              </h3>
              <p class="mb-0">Tips and tricks that most people wouldn't highlight when illustrating.</p>
            </div>

            <div class="card-footer pb-5 px-0 mx-5">
              <div class="media align-items-center">
                <div class="u-sm-avatar mr-3">
                  <img class="img-fluid rounded-circle" src="{{ asset("pron/img/100x100/img4.jpg")}}" alt="Image Description">
                </div>
                <div class="media-body">
                  <h4 class="small mb-0"><a href="../blog/single-article-classic.html">Scott Levine</a></h4>
                </div>
              </div>
            </div>
            <!-- End Blog Grid -->
          </div>

          <!-- Blog Grid -->
          <div class="js-slide card border-0 mb-3">
            <div class="card-body p-5">
              <small class="d-block text-muted mb-2">April 15, 2018</small>
              <h3 class="h5">
                <a href="../blog/single-article-classic.html">Breathing in the Crisp Air of Lake</a>
              </h3>
              <p class="mb-0">Sailing here was a surreal experience.</p>
            </div>

            <div class="card-footer pb-5 px-0 mx-5">
              <div class="media align-items-center">
                <div class="u-sm-avatar mr-3">
                  <img class="img-fluid rounded-circle" src="{{ asset("pron/img/100x100/img1.jpg")}}" alt="Image Description">
                </div>
                <div class="media-body">
                  <h4 class="small mb-0"><a href="../blog/single-article-classic.html">Andrea Gard</a></h4>
                </div>
              </div>
            </div>
            <!-- End Blog Grid -->
          </div>
        </div>
        <!-- End News Carousel -->
      </div>
    </div>
    <!-- End Blog Grid Section -->
  </main>
  <!-- ========== END MAIN ========== --> --}}

  <!-- ========== FOOTER ========== space-top-2 space-top-md-3 -->
  <footer class="container" id="footer">
    <hr>

    <div class="d-flex justify-content-between align-items-center py-7">
      <!-- Copyright -->
      <p class="small text-muted mb-0">&copy; Lembaga Pengembangan dan Konsultasi Nasional: {{ date('Y') }}.</p>
      <!-- End Copyright -->

      <!-- Social Networks -->
      {{-- <ul class="list-inline mb-0">
        <li class="list-inline-item">
          <a class="btn btn-sm btn-icon btn-soft-secondary btn-bg-transparent" href="#">
            <span class="fab fa-facebook-f btn-icon__inner"></span>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="btn btn-sm btn-icon btn-soft-secondary btn-bg-transparent" href="#">
            <span class="fab fa-google btn-icon__inner"></span>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="btn btn-sm btn-icon btn-soft-secondary btn-bg-transparent" href="#">
            <span class="fab fa-twitter btn-icon__inner"></span>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="btn btn-sm btn-icon btn-soft-secondary btn-bg-transparent" href="#">
            <span class="fab fa-github btn-icon__inner"></span>
          </a>
        </li>
      </ul> --}}
      <!-- End Social Networks -->
    </div>
  </footer>
  <!-- ========== END FOOTER ========== -->

  <!-- Go to Top -->
  <a class="js-go-to u-go-to" href="#"
    data-position='{"bottom": 15, "right": 15 }'
    data-type="fixed"
    data-offset-top="400"
    data-compensation="#header"
    data-show-effect="slideInUp"
    data-hide-effect="slideOutDown">
    <span class="fas fa-arrow-up u-go-to__inner"></span>
  </a>
  <!-- End Go to Top -->

  <!-- JS Global Compulsory -->
  <script src="{{ asset("pron/vendor/jquery/dist/jquery.min.js")}}"></script>
  <script src="{{ asset("pron/vendor/jquery-migrate/dist/jquery-migrate.min.js")}}"></script>
  <script src="{{ asset("pron/vendor/popper.js/dist/umd/popper.min.js")}}"></script>
  <script src="{{ asset("pron/vendor/bootstrap/bootstrap.min.js")}}"></script>

  <!-- JS Implementing Plugins -->
  <script src="{{ asset("pron/vendor/hs-megamenu/src/hs.megamenu.js")}}"></script>
  <script src="{{ asset("pron/vendor/svg-injector/dist/svg-injector.min.js")}}"></script>
  <script src="{{ asset("pron/vendor/fancybox/jquery.fancybox.min.js")}}"></script>
  <script src="{{ asset("pron/vendor/slick-carousel/slick/slick.js")}}"></script>
  <script src="{{ asset("pron/vendor/jquery-validation/dist/jquery.validate.min.js")}}"></script>
  <script src="{{ asset("pron/vendor/cubeportfolio/js/jquery.cubeportfolio.min.js")}}"></script>

  <!-- JS Front -->
  <script src="{{ asset("pron/js/hs.core.js")}}"></script>
  <script src="{{ asset("pron/js/components/hs.header.js")}}"></script>
  <script src="{{ asset("pron/js/components/hs.unfold.js")}}"></script>
  <script src="{{ asset("pron/js/components/hs.fancybox.js")}}"></script>
  <script src="{{ asset("pron/js/components/hs.slick-carousel.js")}}"></script>
  <script src="{{ asset("pron/js/components/hs.validation.js")}}"></script>
  <script src="{{ asset("pron/js/components/hs.focus-state.js")}}"></script>
  <script src="{{ asset("pron/js/components/hs.cubeportfolio.js")}}"></script>
  <script src="{{ asset("pron/js/components/hs.svg-injector.js")}}"></script>
  <script src="{{ asset("pron/js/components/hs.go-to.js")}}"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(window).on('load', function () {
      // initialization of HSMegaMenu component
      $('.js-mega-menu').HSMegaMenu({
        event: 'hover',
        pageContainer: $('.container'),
        breakpoint: 767.98,
        hideTimeOut: 0
      });

      // initialization of svg injector module
      $.HSCore.components.HSSVGIngector.init('.js-svg-injector');
    });

    $(document).on('ready', function () {
      // initialization of header
      $.HSCore.components.HSHeader.init($('#header'));

      // initialization of unfold component
      $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

      // initialization of fancybox
      $.HSCore.components.HSFancyBox.init('.js-fancybox');

      // initialization of slick carousel
      $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

      // initialization of form validation
      $.HSCore.components.HSValidation.init('.js-validate');

      // initialization of forms
      $.HSCore.components.HSFocusState.init();

      // initialization of cubeportfolio
      $.HSCore.components.HSCubeportfolio.init('.cbp');

      // initialization of go to
      $.HSCore.components.HSGoTo.init('.js-go-to');
    });

    $('#acaraForm').submit(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#ref_field').removeAttr('disabled');

        $.ajax({
            type: 'post',
            url: $(this).attr("action"),
            data: new FormData($('#acaraForm')[0]),
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(data) {
                if(data.status == "ok"){
                    $('#ref_field').attr('disabled', 'disbled');
                    window.location.href = data.route;
                }
            },
            error: function(data){
                var data = data.responseJSON;
                if(data.status == "fail"){
                    // toastr["error"](data.messages);
                }
            }
        });
    });

    // Set the date we're counting down to
    var countDownDate = new Date("Oct 9, 2020 10:00:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("countdown").innerHTML = days + " hari " + hours + ":"
    + minutes + ":" + seconds;

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("countdown").innerHTML = "EXPIRED";
    }
    }, 1000);

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
  </script>
</body>
</html>