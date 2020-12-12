@extends('layouts.home.hmaster')
@section('title')
    {{ 'Referanslar' }}
@endsection
@section('keywords')
    {{ 'Referanslar' }}
@endsection
@section('description')
    {{ 'Referanslar' }}
@endsection
@if (session('success'))
    <div class="alert">{{ session('success') }} </div>
@endif


@section('content')

    <!-- bradcam_area  -->
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
				<h3>Referanslar</h3>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            <div class="section-top-border">
				<div class="row gallery-item">
                    @foreach ($referans as $item)
                        <div class="col-md-4">
                        <a href="{{ $item->url }}"><h3>{{ $item->title }}</h3></a>
						<a href="/uploads/images/{{ $item->image }}" class="img-pop-up">
							<div class="single-gallery-image" style="background: url(/uploads/images/{{ $item->image }});"></div>
						</a>
					</div>
                    @endforeach
					
				</div>
			</div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
