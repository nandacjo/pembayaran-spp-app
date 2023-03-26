@extends('layouts.app_sneat_blank')

@section('content')

<script type="text/javascript">
  window.print();

</script>

<div class="container mt-5">
  <div class="d-flex justify-content-center row">
    <div class="col-md-8">
      <div class="p-3 bg-white rounded">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-uppercase">KWITANSI PEMBAYARAN</h1>
            <div class="billed"><span class="font-weight-bold ">Nama Sekolah: </span><span class="ml-1">SD Siti Ambia</span></div>
            <div class="billed"><span class="font-weight-bold ">Tanggal Tagihan: </span><span class="ml-1">{{ $pembayaran->tanggal_bayar->translatedFormat('l, d F Y') }}</span></div>
            <div class="billed"><span class="font-weight-bold ">Pembayaran ID:</span><span class="ml-1">#SDUS-{{ $pembayaran->id }}</span></div>
          </div>
        </div>
        <div class="mt-3">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Tanggal Pembayaran</th>
                  <th>Metode Bayar</th>
                  <th>Jumlah Pembayaran</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $pembayaran->tanggal_bayar->translatedFormat('d/m/Y') }}</td>
                  <td>{{ formatRupiah( $pembayaran->jumlah_dibayar) }}</td>
                  <td>{{ $pembayaran->metode_pembayaran }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="text-right mb-3">
          <i>Terbilang:: {{ ucwords(terbilang($pembayaran->jumlah_dibayar))  }}</i>
        </div>
        <div class="justify-content-end d-flex">
          Palembang, {{ $pembayaran->tanggal_bayar->translatedFormat('d F Y') }}
          <br>
          <br>
          <br>
          {{ $pembayaran->user->name }}
        </div>
      </div>
    </div>
  </div>

  @endsection
