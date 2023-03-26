@extends('layouts.app_sneat')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="row mb-3">

                        {{-- Menu tambah data --}}
                        <div class="col-md-6">
                            <a href="{{ route($routePrefix . '.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                        </div>
                        {{-- End menu tambah data --}}

                        {{-- Menu search berdasarkan bulan dan tahun --}}
                        <div class="col-md-6">
                            {!! Form::open(['route' => $routePrefix . '.index', 'method' => 'GET']) !!}
                            <form>
                                <div class="row">
                                    <div class="col">
                                        {!! Form::selectMonth('bulan', request('bulan'), ['class' => 'form-control form-control-sm']) !!}
                                    </div>
                                    <div class="col">
                                        {!! Form::selectRange('tahun', 2022, date('Y') + 1, request('tahun'), ['class' => 'form-control
                                        form-control-sm']) !!}
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-sm btn-primary">Tampil</button>
                                    </div>
                                </div>
                            </form>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    {{-- End search --}}

                    {{-- Table data tagihan --}}
                    <table class="table-striped table">
                        <thead>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Tanggal Tagihan</th>
                            <th>Status</th>
                            <th>Total Tagihan</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @forelse ($models as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->siswa->nisn }}</td>
                                <td>{{ $item->siswa->nama }}</td>
                                <td>{{ $item->tanggal_tagihan->translatedFormat('l, d-M-Y') }}</td>
                                <td>

                                    <div class="btn {{ $item->status == 'baru' ? 'btn-primary' : 'btn-success' }} btn-sm">{{ Str::ucfirst($item->status) }}</div>
                                </td>
                                <td>{{ $item->tagihanDetails->sum('jumlah_biaya') }}</td>
                                <td>
                                    {!! Form::open([
                                    'route' => [$routePrefix . '.destroy', $item->id],
                                    'method' => 'DELETE',
                                    'onsubmit' => 'return confirm("Yakin ingin menghapus data ini?")',
                                    ]) !!}
                                    {{-- <a href="{{ route($routePrefix . '.edit', $item->id) }}" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> Edit </a> --}}
                                    <a href="{{ route($routePrefix . '.show', [
										$item->id,
										'siswa_id' => $item->siswa_id,
										'bulan' => $item->tanggal_tagihan->format('m'),
										'tahun' => $item->tanggal_tagihan->format('Y'),
									]) }}" class="btn btn-info btn-sm"> <i class="fa fa-edit"></i> Detail </a>

                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-danger text-center">Data tdak ada</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- End Tabel tagihan --}}

                    {!! $models->links() !!}
                </div>
            </div>
        </div>
    </div>
    {{-- /*
  format('d M Y') untuk mengubah format tanggal mengunakan carbon, formatnya english
  translatedFormat('l, d m Y') untuk mengubah atau translate ke bahasa indonesia
  */ --}}

</div>
@endsection
