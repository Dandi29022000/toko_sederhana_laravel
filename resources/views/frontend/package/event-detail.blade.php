@extends('frontend.layouts.app')
@section('content')

<div
    class="site-cover site-cover-sm same-height overlay single-page"
    style="background-image: url({{ asset('img/2.jpg') }})"
>
<div class="container">
    <div class="row same-height justify-content-center">
        <div class="col-md-6">
        <div class="post-entry text-center">
            <h1 class="mb-4">{{ $Event->judul }}</h1>
        </div>
        </div>
    </div>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row blog-entries element-animate">
            <div class="col-md-12 col-lg-12 main-content">
                <div class="post-content-body">
                    <p>
                        {{ $Event->deskripsi}}
                    </p>
                    <div class="row my-4">
                    <div class="col-md-12 mb-4">
                        <img
                        src="{{ Storage::url($Event->gambar) }}"
                        alt="Image placeholder"
                        class="img-fluid rounded"
                        />
                    </div>
                    </div>
                </div>
            </div>

            <!-- END main-content -->
        </div>
    </div>
</section>

@endsection