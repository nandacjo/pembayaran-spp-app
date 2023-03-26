@extends('layouts.app_sneat_wali')


@section('content')

<div class="row mb-4">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tagihan /</span> Tagihan Wali</h4>
    <div class="col-md-4">
        <div class="card">
            <img src="{{ \Storage::url($siswa->foto) }}" class="img-thumbnail" alt="{{ $siswa->name }}" width="100">
            <div class="card-header">
                <h5 class="card-title">Profil Siswa</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <tr>
                        <th width='10%'>NISN</th>
                        <th width='3%'>:</th>
                        <th>{{ $siswa->nisn }}</th>
                        </th>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <th>:</th>
                        <td>{{ $siswa->nama }}</td>
                        </th>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <th>:</th>
                        <td>{{ $siswa->jurusan }}</td>
                        </th>
                    </tr>
                    <tr>
                        <th>Angkatan</th>
                        <th>:</th>
                        <td>{{ $siswa->angkatan }}</td>
                        </th>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <th>:</th>
                        <td>{{ $siswa->kelas }}</td>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Keterangan Data Tagihan</h5>
                <table class="table table-bordered table-sm">
                    <tr class="align-content-end">
                        <th width='30%'>No Tagihan</th>
                        <th width='3%'>:</th>
                        <td>#UHSD-{{ $tagihan->id }}</td>
                        </th>
                    </tr>
                    <tr>
                        <th>Tgl. Tagihan</th>
                        <th>:</th>
                        <th>{{ $tagihan->tanggal_tagihan->format('d F Y') }}</th>
                        </th>
                    </tr>
                    <tr>
                        <th>Jgl. Akhir Pembayaran</th>
                        <th>:</th>
                        <th>{{ $tagihan->tanggal_jatuh_tempo->format('d F Y') }}</th>
                        </th>
                    </tr>
                    <tr>
                        <th>Statu Pembayaran</th>
                        <th>:</th>
                        <th>{{ $tagihan->getStatusTagihanWali() }}</th>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center position-relative">
    <div class="col-md-12">
        <div class="card position-relative">
            <h5 class="card-header">DATA TAGIHAN <span class="fw-bold">{{ strtoupper($siswa->nama) }}</span> </h5>
            <a href="{{ route('kwitansipembayaran.show', $siswa->id) }}" class="btn btn-sm btn-primary position-absolute rounded-0 rounded-end-top" style="right: 0"> <i class="fa fa-file-pdf"> Cetak Invoice Tagihan</i> </a>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr class="table-dark">
                                <th width="1%" class="text-white">No</th>
                                <th class="text-white">NAMA TAGIHAN</th>
                                <th class="text-white text-end">JUMLAH TAGIHAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tagihan->tagihanDetails as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_biaya }}</td>
                                <td class="text-end">{{ formatRupiah($item->jumlah_biaya) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-danger text-center">Data tdak ada</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="text-center fw-bold">Total Pembayaran</td>
                                <td class="text-end fw-bold">
                                    <span class="text-danger">
                                        {{
                                        formatRupiah($tagihan->tagihanDetails->sum('jumlah_biaya')) }}
                                    </span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="alert alert-secondary mt-3" role="alert">
                        Pembayaran bisa dilakuakan denga cara langsung datang ke sekolah, atau melalui transefer
                        ke rekening bank sekolah berikut: <br>
                        <i class="fw-bold text-decoration-underline">Perhatian! Jangan melakukan pembayaran ke rekening
                            selain nomor rekening di
                            bawah ini</i> <br>
                        Silahka lihat tata cara melakukan pembayaran melalui <span>ATM</span> ataun <span>INTERNET
                            BANKING</span>
                        <br>
                        Setelah melakukan pembayaran, silahkan upload bukti pembayaran melalui tombol konfirmasi dibawah
                        ini
                    </div>

                    <div class="mt-3">
                        <ul>
                            <li><a href="#">Lihat cara pembayarn melalui ATM</a></li>
                            <li><a href="@">Lihat cara pembayaran melalui Bank Transfer</a></li>
                        </ul>
                    </div>

                </div>

                <div class="row">
                    @foreach ($banksekolah as $bank)
                    <div class="col-md-6">
                        <div class="alert alert-dark" role="alert">
                            <table class="table table-sm" width="100%">
                                <tr>
                                    <th width="30%">Nama Bank</th>
                                    <td class="text-start">: {{ $bank->nama_bank }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Rekening</th>
                                    <td>: {{ $bank->nomor_rekening }}</td>
                                </tr>
                                <tr>
                                    <th>Atas Nama</th>
                                    <td>: {{ $bank->nama_rekening }}</td>
                                </tr>

                            </table>
                            <a href="{{ route('wali.pembayaran.create', [
                'tagihan_id' => $tagihan->id,
                'bank_sekolah_id' => $bank->id
              ]) }}" class="btn btn-primary text-center d-block mt-3">Konfirmasi
                                Pembayaran</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
