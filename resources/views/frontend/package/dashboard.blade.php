@extends('frontend.layouts.app')
@section('content')

<!-- slider -->
<div class="slider-area">
    <div class="slider-active owl-carousel">
        @foreach($Slide as $s)
            <div class="single-slider-4 slider-height-6 bg-img" style="background-image: url({{ Storage::url($s->path) }})">
                <div class="container">
                    <div class="row">
                        <div class="ml-auto col-lg-6">
                            <div class="furniture-content fadeinup-animated">
                                <h2 class="animated">{{ $s->title }}</h2>
                                <p class="animated">{{ $s->body }}</p>
                                <a class="furniture-slider-btn btn-hover animated" href="{{ $s->url }}">Go</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- end -->

<!-- about -->
<div class="popular-product-area wrapper-padding-3 pt-115 pb-115">
	<div class="container-fluid">
		<div class="section-title-6 text-center mb-50">
            <h1 class="text-center">Selamat Datang</h1>
            <img src="{{ asset('img/logo-online-shop.jpg') }}" class="rounded mx-auto d-block" width="300" alt="">
            <br>
            <p class="text-align">Toko Online Sederhana yang menyediakan berbagai macam makanan ringan (snack) dan minuman 
                          dalam kemasan.</p>
        </div>
    </div>
</div>
@endsection
