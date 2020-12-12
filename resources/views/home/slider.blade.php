<!-- slider_area_start -->
@section('slider')
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            @foreach ($slider as $sl)
                <div class="single_slider  d-flex align-items-center slider_bg_1 overlay"
                    style="background:url('/uploads/images/{{ $sl->image }}');background-size:auto 100%;">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-12 col-md-12">
                                <div class="slider_text text-left" style="">
                                    <h3> {{ $sl->title }}</h3>
                                </div>
                                <div class="slider_text text-left" style="">
                                    <h5> {{ $sl->description }}</h5>
                                </div>
                                <div class="slider_text text-left" style="">
                                    <h6><a href="">Daha Fazla</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <style>
            .slider_area {
                height: 500px !important;
            }

            .single_slider {
                height: 500px !important;
            }

            .slider_text h3 {
                padding-left: 10% !important;
                width: 40% !important;
                margin-bottom: 5px !important;
                background-color: rgba(0, 0, 0, 0.76) !important;
                font: bold 40px calibri !important;
            }

            .slider_text h5 {
                width: 60% !important;
                padding-left: 10% !important;
                background-color: rgba(0, 0, 0, 0.76) !important;
                font: normal 30px calibri !important;
                color: seashell !important;
            }

            .slider_text h6 {
                width: 30% !important;
                padding-left: 10% !important;
                background-color: rgba(35, 57, 77, 0.9) !important;
                font: normal 30px calibri !important;
                color: rgb(255, 212, 133) !important;
            }

            .slider_text h6 a:hover {
                color: rgb(94, 245, 145) !important;
            }

            @media (max-width:600px) {
                .slider_text h3 {
                    padding-left: 10% !important;
                    width: 100% !important;
                    margin-bottom: 5px !important;
                    background-color: rgba(0, 0, 0, 0.76) !important;
                    font: bold 40px calibri !important;
                }

                .slider_text h5 {
                    width: 100% !important;
                    padding-left: 10% !important;
                    background-color: rgba(0, 0, 0, 0.76) !important;
                    font: normal 30px calibri !important;
                    color: seashell !important;
                }

                .slider_text h6 {
                    width: 60% !important;
                    padding-left: 10% !important;
                    background-color: rgba(35, 57, 77, 0.9) !important;
                    font: normal 30px calibri !important;
                    color: rgb(255, 212, 133) !important;
                }

            }

        </style>
    @endsection
    <!-- slider_area_end -->
