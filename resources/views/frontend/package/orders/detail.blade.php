@extends('frontend.layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/frontend/order') }}" class="btn btn-primary py-1"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/frontend-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/frontend/order') }}">Riwayat Pemesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Sukses Check Out</h4>
                    <p>Pesanan Anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer di rekening Bank BRI.
                         <br> <strong>Nomer Rekening : 32113-821312-123</strong> dengan nominal : <strong>Rp. {{ number_format($transaksi->kode+$transaksi->jumlah_harga) }}</strong></p>
                    <p>Apabila sudah melakukan transfer bisa kirim bukti transfer ke nomer WhatsApp <strong>087846184617</strong> atau klik tombol dibawah. <br>
                        <a href="{{ url('frontend/order/konfirmasi') }}" target="_blank" class="btn btn-success py-1 mt-3" onclick="return confirm('Anda yakin akan melanjutkan ke WhatsApp?');">
                        <i class="fa-brands fa-whatsapp"></i> WhatsApp</a>.
                    </p>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h4><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h4>
                    @if(!empty($transaksi))
                    <p align="right">Tanggal Pesan : {{ $transaksi->tanggal }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                
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
                                <td>{{ $transaksi_detail->jumlah }} kain</td>
                                <td align="right">Rp. {{ number_format($transaksi_detail->barang->harga_jual) }}</td>
                                <td align="right">Rp. {{ number_format($transaksi_detail->jumlah_harga) }}</td>
                                
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($transaksi->jumlah_harga) }}</strong></td>
                                
                            </tr>
                            <tr>
                                <td colspan="5" align="right"><strong>Kode Unik :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($transaksi->kode) }}</strong></td>
                                
                            </tr>
                             <tr>
                                <td colspan="5" align="right"><strong>Total yang harus ditransfer :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($transaksi->kode+$transaksi->jumlah_harga) }}</strong></td>
                                
                            </tr>
                            @else
                            <tr>
                                <td colspan="5">Data tidak tersedia</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    @endif

                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection