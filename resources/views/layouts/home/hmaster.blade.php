<?php
                                $kurumsal=DB::select('select*from sayfa where status=?',['Açık']);
                                $menu=DB::select('select*from category where status=?',['Kategori']);
                                $setting = DB::select('select*from setting where id=?',[1]);
                                $galery= DB::table('galery')->where('status', 'Açık')->take(6)->get();


                            ?>
                            <!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/home/img/logo.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="/assets/home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/home/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/home/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/home/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/home/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/home/css/nice-select.css">
    <link rel="stylesheet" href="/assets/home/css/flaticon.css">
    <link rel="stylesheet" href="/assets/home/css/gijgo.css">
    <link rel="stylesheet" href="/assets/home/css/animate.css">
    <link rel="stylesheet" href="/assets/home/css/slicknav.css">
    <link rel="stylesheet" href="/assets/home/css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div  class="col-xl-2 col-lg-2">
                                <div  class="logo">
                                    <a href="/">
                                        <img src="/uploads/images/{{ $setting[0]->logo }}" alt="">
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-xl-6 col-lg-6">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="active" href="/">Ana Sayfa</a></li>
                                            <li><a href="/categories" > Kategoriler</a>
                                                <ul class="submenu">
                                                    @foreach($menu as $ks)
                                                       <li><a style="font-size: 16px;" href="/categories/{{ $ks->id }}">{{ $ks->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li><a href="#"> Kurumsal</a>
                                                <ul class="submenu">
                                                    @foreach($kurumsal as $ks)
                                                       <li><a style="font-size: 16px;" href="/{{ $ks->slug }}">{{ $ks->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li><a href="/categories/28">Blog</a></li>
                                            <li><a href="/referans">Referansalar</a></li>
                                            <li><a href="/iletisim">İletişim</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <div class="social_wrap d-flex align-items-center justify-content-end">
                                    <div class="number">
                                        <p> <i class="fa fa-phone"></i>{{$setting[0]->phone}}</p>
                                    </div>
                                    <div class="social_links d-none d-xl-block">
                                        <ul>
                                            <li><a href="{{$setting[0]->instagram}}"> <i class="fa fa-instagram"></i> </a></li>
                                            <li><a href="{{$setting[0]->facebook}}"> <i class="fa fa-facebook"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <div style="height: 50px;">

    </div>
    <!-- header-end -->
@yield('slider')  <!-- slider_area_start -->
@yield('content')







 <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4 ">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="img/footer_logo.png" alt="">
                                </a>
                            </div>
                            <p> {!! $setting[0]->contact !!} <br>
                                <b style="color:white;" href="#">{{ $setting[0]->phone }}</b> <br>
                                <b style="color:white;" href="#">{{ $setting[0]->email }}</b>
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="{{ $setting[0]->facebook }}">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $setting[0]->twitter }}">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $setting[0]->instagram }}">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Firmamız
                            </h3>
                            <ul class="links">
                                <li><a href="/">Ana Sayfa</a></li>
                                @foreach ($menu as $ks)
                                    <li><a href="/categories/{{ $ks->id }}">{{ $ks->title }}</a></li>
                                @endforeach
                                <li><a href="/iletisim"> İletişim</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Kurumsal
                            </h3>
                            <ul class="links double_links">
                                @foreach ($kurumsal as $ks)
                                    <li><a href="/{{ $ks->slug }}">{{ $ks->title }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Galeri
                            </h3>
                            <div class="instagram_feed">
                                @foreach ($galery as $rs)
                                    <div class="single_insta">
                                    <a href="/uploads/images/{{ $rs->image }}" class="img-pop-up">
                                        <img style="width: 70px; height:60px; " src="/uploads/images/{{ $rs->image }}" alt="{{ $rs->title }}">
                                    </a>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
&copy;<script>document.write(new Date().getFullYear());</script> Tüm hakları saklıdır | Bu site  <a mailto="resid.hemidov.2014@gmail.com" target="_blank">Rashid Hamidov</a>tarafından yapılmıştır.
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->
<style>
    footer{
        width: 100% !important;
    }
</style>
    <!-- JS here -->
    <script src="/assets/home/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="/assets/home/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/assets/home/js/popper.min.js"></script>
    <script src="/assets/home/js/bootstrap.min.js"></script>
    <script src="/assets/home/js/owl.carousel.min.js"></script>
    <script src="/assets/home/js/isotope.pkgd.min.js"></script>
    <script src="/assets/home/js/ajax-form.js"></script>
    <script src="/assets/home/js/waypoints.min.js"></script>
    <script src="/assets/home/js/jquery.counterup.min.js"></script>
    <script src="/assets/home/js/imagesloaded.pkgd.min.js"></script>
    <script src="/assets/home/js/scrollIt.js"></script>
    <script src="/assets/home/js/jquery.scrollUp.min.js"></script>
    <script src="/assets/home/js/wow.min.js"></script>
    <script src="/assets/home/js/nice-select.min.js"></script>
    <script src="/assets/home/js/jquery.slicknav.min.js"></script>
    <script src="/assets/home/js/jquery.magnific-popup.min.js"></script>
    <script src="/assets/home/js/plugins.js"></script>
    <script src="/assets/home/js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="/assets/home/js/contact.js"></script>
    <script src="/assets/home/js/jquery.ajaxchimp.min.js"></script>
    <script src="/assets/home/js/jquery.form.js"></script>
    <script src="/assets/home/js/jquery.validate.min.js"></script>
    <script src="/assets/home/js/mail-script.js"></script>

    <script src="/assets/home/js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }

        });
    </script>
</body>
</html>
