@extends('frontend.layouts.app')
@section('content')

<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url({{ asset('img/2.jpg') }})">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2>dengan berbagai macam barang</h2>
            <ul>
                <li><a href="#">home</a></li>
                <li>Barang</li>
            </ul>
        </div>
    </div>
</div>

<div class="shop-page-wrapper shop-page-padding ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-product-wrapper res-xl">
                    <div class="shop-bar-area">
                        <div class="shop-product-content tab-content">
                            <div id="grid-sidebar3" class="tab-pane fade active show">

                                <h4 class="text-center font-weight-bold m-4">Barang</h4>
                                <!-- grid view -->
                                <div class="row">
                                    
                                    @forelse ($Barang as $Brg)
                                        <!-- grid box -->
                                        <div class="col-md-6 col-xl-4">
                                            <div class="product-wrapper mb-30">
                                                <div class="product-img">
                                                    <a href="{{ url('/frontend-barang') }}">
                                                        <img src="{{asset('storage/'.$Brg->gambar)}}"  alt="">
                                                    </a>
                                                    <span>hot</span>
                                                    <div class="product-action">
                                                        <a class="btn-primary text-center" href="{{ route('frontend.barang-detail', $Brg->id) }}">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-content text-center">
                                                    <h4><a href="{{ url('/frontend-barang') }}"><b>{{ $Brg->nama_barang }}</b></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end -->
                                    @empty
                                        No product found!
                                    @endforelse
                                </div>
                            <!-- end -->
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="mt-50 text-center">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
