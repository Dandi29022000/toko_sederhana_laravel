@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Master Data Detail Transaksi</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h5 class="m-0 font-weight-bold text-primary">Data Detail Transaksi</h5>
	</div>

	<div class="card-body">
		<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="float-left my-2">
					<a href="{{ route('transaksi.index') }}" class="mr-4">
						<button type="button" class="btn btn-warning py-1"><i class="fa fa-arrow-left"></i> Kembali</button>
					</a>
				</div>
			</div>
		</div>

		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Harga Jual</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
			    <tbody>
                    <?php $no = 1; ?>
                    @if($transaksi_details->count() > 0)
                    @foreach($transaksi_details as $transaksi_detail)
                    <tr>
                        <td>
                            <?php
                            echo $no++;
                            ?>
                        </td>
                        <td>
                            <img src="{{asset('storage/'.$transaksi_detail->barang->gambar)}}" width="100" alt="...">
                        </td>
                        <td>{{ $transaksi_detail->barang->nama_barang }}</td>
                        <td>{{ $transaksi_detail->transaksi->tanggal }} kain</td>
                        <td>{{ $transaksi_detail->jumlah }} kain</td>
                        <td align="right">Rp. {{ number_format($transaksi_detail->barang->harga_jual) }}</td>
                        <td align="right">Rp. {{ number_format($transaksi_detail->jumlah_harga) }}</td>
                        <td>
                            <form action="{{ route('transaksi.destroy',$transaksi_detail->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data detail transaksi?')">
								@csrf
								@method('DELETE')
								<button class="btn btn-danger btn-circle" type="submit" class="btn btn-danger">
									<i class="fas fa-trash"></i>
								</button>
							</form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5">Data tidak tersedia</td>
                    </tr>
                    @endif
                </tbody>
            </table>
		</div>
	</div>
</div>

</div>
@endsection