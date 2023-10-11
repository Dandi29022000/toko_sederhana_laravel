@extends('frontend.layouts.app')
@section('content')

<div class="cart-main-area pt-15 pb-30">
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4 class="cart-heading"><i class="fa fa-shopping-cart"></i> Keranjang</h4>
                
                @if(!empty($Transaksi))
                <p align="right">Tanggal Pesan : {{ $Transaksi->tanggal }}</p>

                <div class="table-content table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>gambar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @if($Transaksi_details->count() > 0)
                                @foreach($Transaksi_details as $Transaksi_detail)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            <img src="{{asset('storage/'.$Transaksi_detail->barang->gambar)}}" width="100" alt="...">
                                        </td>
                                        <td>{{ $Transaksi_detail->barang->nama_barang }}</td>
                                        <td>{{ $Transaksi_detail->jumlah }} barang</td>
                                        <td align="right">Rp. {{ number_format($Transaksi_detail->barang->harga_jual) }}</td>
                                        <td align="right">Rp. {{ number_format($Transaksi_detail->jumlah_harga) }}</td>
                                        <td>
                                            <form action="{{ url('frontend/check-out') }}/{{ $Transaksi_detail->id }}" method="post">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" onclick="return confirm('Anda yakin akan menghapus data?');"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                    <td align="right"><strong>Rp. {{ number_format($Transaksi->jumlah_harga) }}</strong></td>
                                    <td>
                                        <a href="{{ url('/frontend/check-out/konfirmasi') }}" class="btn btn-success py-1" onclick="return confirm('Anda yakin akan Check Out ?');">
                                            <i class="fa fa-shopping-cart"></i> Check Out
                                        </a>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="6">Data tidak tersedia</td>
                                </tr>
                            @endif                                   
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection