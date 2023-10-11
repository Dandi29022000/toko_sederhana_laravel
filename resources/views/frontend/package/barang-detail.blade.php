@extends('frontend.layouts.app')
@section('content')


<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url({{ asset('img/1.jpg') }})">
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
				<div class="col-md-12 mb-2">
					<a href="{{ url('/frontend-barang') }}" class="btn btn-warning py-1"><i class="fa fa-arrow-left"></i> Kembali</a>
				</div>
				<div class="col-lg-12">
					<div class="shop-product-wrapper res-xl">
						<div class="shop-bar-area">
							<div class="shop-product-content tab-content">
								<div id="grid-sidebar3" class="tab-pane fade active show">

								<div class="col-md-12 mt-1">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col-md-6">
														<img src="{{asset('storage/'.$Barang->gambar)}}" class="rounded mx-auto d-block" width="80%" alt=""> 
													</div>
													<div class="col-md-6 mt-5">
														<h2>{{ $Barang->nama_barang }}</h2>
														
														<form method="post" action="{{ route('frontend.transaksi', $Barang->id) }}" >
															@csrf
															<table class="table">								
																<tbody>
																	<tr>
																		<td>Kode Barang</td>
																		<td>:</td>
																		<td>{{ ($Barang->kode_barang) }}</td>
																	</tr>
																	<tr>
																		<td>Harga</td>
																		<td>:</td>
																		<td>Rp. {{ number_format($Barang->harga_jual) }}</td>
																	</tr>
																	<tr>
																		<td>Satuan</td>
																		<td>:</td>
																		<td>{{ number_format($Barang->satuan) }}</td>
																	</tr>
																	<tr>
																		<td>Pabrik</td>
																		<td>:</td>
																		<td>{{ $Barang->pabrik }}</td>
																	</tr>
																
																	<tr>
																		<td>Jumlah Pesan</td>
																		<td>:</td>
																		<td>
																			<input type="text" name="jumlah_pesan" class="form-control" required="">
																		</td>
																	</tr>
																</tbody>
															</table>
														
															<button type="submit" class="btn btn-primary py-1"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
														</form>
													</div>
												</div>
											</div>
										</div>
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