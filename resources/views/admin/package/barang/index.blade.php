@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Master Data Barang</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h5 class="m-0 font-weight-bold text-primary">Data Barang</h5>
	</div>

	<div class="card-body">
		<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="float-left my-2">
					<a href="{{ route('barang.create') }}" class="mr-4">
						<button type="button" class="btn btn-success"><i class="fa fa-plus-square"></i> Tambah</button>
					</a>
				</div>


				<div class="float-right my-2">
					<div class="float-left">
						<form action="{{ route('barang.index') }}" method="GET" role="search">
							<div class="input-group">
								<a href="{{ route('barang.index') }}" class="mr-4 mt-1">
									<span class="input-group-btn">
										<button class="btn btn-danger" type="button" title="Refresh page">
											<span class="fas fa-sync-alt">Refresh</span>
										</button>
									</span>
								</a>
								
								<input type="text" class="form-control mr-4 mt-1" name="term" placeholder="Search" id="term">
								<span class="input-group-btn mr-2 mt-1">
									<input type="submit" value="Cari" class="btn btn-primary">
								</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>No.</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Pabrik</th>
					<th>Satuan</th>
					<th>Harga Jual</th>
					<th>Gambar</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				@if($Barang->count() > 0)
				@foreach($Barang as $Brg)
				<tr>
					<td>
						<?php
						echo $no++;
						?>
					</td>
					<td>{{ $Brg->kode_barang }}</td>
					<td>{{ $Brg->nama_barang }}</td>
					<td>{{ $Brg->pabrik }}</td>
					<td>{{ $Brg->satuan }}</td>
					<td>{{ $Brg->harga_jual }}</td>
					<td><img width="90px" src="{{ asset('storage/'.$Brg->gambar) }}" alt=""></td>
					<td>
						<form action="{{ route('barang.destroy',$Brg->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data Barang?')">
							<a id="button-edit" class="btn btn-info btn-circle" href="{{ route('barang.edit',$Brg->id) }}">
								<i class="fas fa-pencil-alt"></i>
							</a>
							
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
					<td colspan="6">Data tidak tersedia</td>
				</tr>
					@endif
				</tbody>
			</table>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="d-flex justify-content-center">
					{{ $Barang->links() }}
				</div>
			</div>
		</div>
	</div>
</div>

</div>
@endsection