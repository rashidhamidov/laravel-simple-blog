@extends('layouts.home.hmaster')
@section('title')
    {{ $kategori->title }}
@endsection
@section('keywords')
    {{ $kategori->keywords }}
@endsection
@section('description')
    {{ $kategori->description }}
@endsection



@section('content')

    <!-- bradcam_area  -->
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                     <h3><a href="/categories ">Kategoriler | </a>&nbsp; &nbsp; {{ $kategori->title }}</h3>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- ================ contact section start ================= -->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach ($iceriks as $rs)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img height="20%;" class="card-img rounded-0" src="/uploads/images/{{ $rs->image }}"
                                        alt="{{ $rs->title }}">
                                    <a href="/icerik/{{ $rs->id }}" class="blog_item_date">
                                        <h3> <i class="fa fa-heart-o" ></i></h3>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="/icerik/{{ $rs->id }}">
                                        <h2>{{ $rs->title }}</h2>
                                    </a>
                                    <p>{{ $rs->description }}</p>
                                    <ul class="blog-info-link">
                                        <li><i class="fa fa-user"></i> {{ $rs->tarih }}</li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form  method="POST" action="/search">
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input name="aranan_kelime"type="text" class="form-control" placeholder='Ara'
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ara'">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Bul</button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Kategoriler</h4>
                            <ul class="list cat-list">
                                @foreach ($menu as $ks)
                                    <li>
                                        <a href="/categories/{{ $ks->id }}" class="d-flex">
                                            <p>{{ $ks->title }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Son Eklenenler</h3>
                            @foreach ($son_iceriks as $rs)
                                <div class="media post_item">
                                    <img width="80px;" src="/uploads/images/{{ $rs->image }}" alt="{{ $rs->title }}">
                                    <div class="media-body">
                                        <a href="/icerik/{{ $rs->id }}">
                                            <h3>{{ $rs->title }}</h3>
                                        </a>
                                        <p>{{ $rs->tarih }}</p>
                                    </div>
                                </div>
                            @endforeach


                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
