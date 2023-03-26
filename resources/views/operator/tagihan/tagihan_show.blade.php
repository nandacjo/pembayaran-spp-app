@extends('layouts.app_sneat')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <h5 class="card-header">DATA TAGIHAN SPP SISWA {{ strtoupper($periode) }}</h5>
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        <td rowspan="8" width='10%'>
                            <img src="{{ \Storage::url($siswa->foto) }}" alt="{{ $siswa->name }}" width="100">
                        </td>
                        <th width='10%'>NISN</th>
                        <th width='3%'>:</th>
                        <th>{{ $siswa->nisn }}</th>
                        </th>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <th>:</th>
                        <th>{{ $siswa->nama }}</th>
                        </th>
                    </tr>
                </table>
                <a href="{{ route('kartuspp.index', [
        'siswa_id' => $siswa->id,
        'tahun' => request('tahun'),
      ]) }}" class="btn btn-sm btn-primary mt-3"> <i class="fa fa-file"></i> Kartu Tagihan {{ request('tahun') }} </a>
            </div>
        </div>
        <div class="col mt-3">
            <div class="card">
                <h5 class="card-header pb-0">DATA TAGIHAN {{ strtoupper( $periode) }}</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Bayar</th>
                                    <th>Jumlah Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tagihan->tagihanDetails as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_biaya }}</td>
                                    <td>{{ formatRupiah($item->jumlah_biaya) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">Total Pembayaran</td>
                                    <td>{{ formatRupiah($tagihan->tagihanDetails->sum('jumlah_biaya')) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="card">
            <h5 class="card-header pb-0">DATA PEMBAYARAN</h5>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>TANGGAL</th>
                            <th>JUMLAH</th>
                            <th>METODE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tagihan->pembayaran as $item)
                        <tr>
                            <td>
                                <a href="{{ route('kwitansipembayaran.show', $item) }}" target="blank"><i class="fa fa-print"></i> </a>
                            </td>
                            <td>{{ $item->tanggal_bayar->translatedFormat('d/m/Y') }}</td>
                            <td>{{ formatRupiah( $item->jumlah_dibayar) }}</td>
                            <td>{{ $item->metode_pembayaran }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <h5>Status Pembayaran: {{ strtoupper($tagihan->status) }}</h5>

            </div>
            {{-- formm pembayaran --}}
            <h4 class="card-header">Form Pembayaran</h4>
            <div class="card-body">
                {!! Form::model($model, ['route' => 'pembayaran.store', 'method' => 'POST']) !!}
                {!! Form::hidden('tagihan_id', $tagihan->id, []) !!}

                <div class="form-group">
                    {!! Form::label('tanggal_bayar', 'Tanggal Pembayaran') !!}
                    {!! Form::date('tanggal_bayar', $model->tanggal_bayar ?? \Carbon\Carbon::now(), ['class' => 'form-control'])
                    !!}
                    <div class="text-danger">{{ $errors->first('tanggal_bayar') }}</div>
                </div>

                <div class="form-group mt-3">
                    <label for="jumlah_dibayar">Jumlah Yang Dibayarakan</label>
                    {!! Form::text('jumlah_dibayar', null, ['class' => 'form-control rupiah']) !!}
                    <div class="text-danger">{{ $errors->first('tanggal_dibayar') }}</div>
                </div>

                {!! Form::submit('SIMPAN', ['class' => 'btn btn-sm btn-primary mt-3']) !!}

                {!! Form::close() !!}
            </div>
            {{-- end form pembayaran --}}
        </div>
    </div>
</div>

@endsection
