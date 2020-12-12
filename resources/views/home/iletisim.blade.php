@extends('layouts.home.hmaster')
@section('title')
{{ 'İletişim Sayfası' }}
@endsection
@section('keywords')
{{ 'Hazal Güller İletişim' }}
@endsection
@section('description')
{{ 'Hazal Güller İletişim Sayfası' }}
@endsection

@extends('flash-message')


@section('content')
    
     <!-- bradcam_area  -->
     <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>İletişim</h3>
                    </div>
                </div>
            </div>
        </div>
    <!--/ bradcam_area  -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
                <div class="d-none d-sm-block mb-5 pb-4">
                    <div id="map" style="height: 480px; position: relative; overflow: hidden;">
                    
                    {!! $setting[0]->google_map !!}
                    
                    </div>
                    <style>
                        iframe{
                            width: 100%!important;
                        }
                    </style>
                    
    
                </div>
    
    
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">İletişim Formu</h2>
                    </div>
                    <div class="col-lg-5">
                        <form class="form-contact contact_form" action="/iletisim_send" method="POST" >
                             <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" required placeholder=" Mesajınız"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" required placeholder="İsminiz">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" required placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text" required placeholder="Konu">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Gönder</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>{!! $setting[0]->contact !!}</h3>
                               
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>{!! $setting[0]->phone !!}</h3>
                                 <p>{!! $setting[0]->hours !!}</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>{!! $setting[0]->email !!}</h3>
                                <p>Bize Yazın</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
@endsection
