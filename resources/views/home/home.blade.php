@extends('layouts.home.hmaster')
@section('title')
{{ $setting[0]->title }}
@endsection
@section('keywords')
{{ $setting[0]->keywords }}
@endsection
@section('description')
{{ $setting[0]->description }}
@endsection



@section('slider')
    @include('home.slider')
@endsection


@section('content')
    @include('home.content')
@endsection
