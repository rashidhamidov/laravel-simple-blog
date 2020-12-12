@section('content')

    <!-- popular_destination_area_start  -->
    

    <!-- Video alanı başlangıç  -->
    <div class="container box_1170">
        <div class="section-top-border">
            <h3 class="mb-30">{{ $uzman->title }}</h3>
            <div class="row">
                <div class="col-md-3">
                    <img src="/uploads/images/{{ $uzman->image }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-9 mt-sm-20">
                    <b>{{ $uzman->description }}</b>
                    {!! $uzman->content !!}
                </div>
            </div>
        </div>
    </div>
    <div class="video_area video_bg overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video_wrap text-center">
                        <h2>{{ $video[0]->title}}</h2>
                        <div class="video_icon">
                            <a class="popup-video video_play_button" href="{!!  $video[0]->url !!}">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video alanı bitiş  -->
    
    <div class="recent_trip_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Uygulamalarımız</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($uygulama as $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="single_trip">
                            <div class="thumb">
                                <img height="150x;"src="/uploads/images/{{ $item->image }}" alt="{{ $item->title }}">
                            </div>
                            <div class="info">
                                <a href="/icerik/{{ $item->id }}">
                                    <h3>{{ $item->title }}</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- /testimonial_area  -->

@endsection
