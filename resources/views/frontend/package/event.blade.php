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
            <h1 class="mb-4">Event</h1>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="section search-result-wrap">
    <div class="container">
        <div class="row posts-entry">
            <div class="col-lg-12">
                @foreach($Event as $e)
                    <div class="blog-entry d-flex blog-entry-search-item">
                        <a href="single.html" class="img-link me-4">
                        <img src="{{ Storage::url($e->gambar) }}" width="200px" alt="Image" class="img-fluid" />
                        </a>
                        <div>
                        <span class="date"
                            >{{ $e->tanggal }} &bullet; <a href="#">{{ $e->jenis }}</a></span
                        >
                        <h2>
                            <a href="#"
                            >{{ $e->judul }}</a
                            >
                        </h2>
                        <p>
                            {{ substr($e->deskripsi, 0, 100) }}{{ strlen($e->deskripsi) > 100 ? "..." : "" }}
                        </p>
                        <p>
                            <a href="{{ route('frontend.event-detail', $e->id) }}" class="btn btn-sm btn-outline-primary py-2"
                            >Read More</a
                            >
                        </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- END sidebar-box -->
            </div>
        </div>
    </div>
</div>

@endsection