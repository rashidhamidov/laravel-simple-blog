@extends('layouts.home.hmaster')
@section('title')
    {{ $kurumsal->title }}
@endsection
@section('keywords')
    {{ $kurumsal->keywords }}
@endsection
@section('description')
    {{ $kurumsal->description }}
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
                    <h3>{{ $kurumsal->title }}</h3>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            <div class="section-top-border">
				<h3 class="mb-30">{{ $kurumsal->description }}</h3>
				<div class="row">
					<div class="col-lg-12">
						<blockquote class="generic-blockquote">
                            <img width="400px"align="right"src="/uploads/images/{{ $kurumsal->image }}" alt="{{ $kurumsal->title }}">
                        {!! $kurumsal->content !!}
                        
						</blockquote>
					</div>
				</div>
			</div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
