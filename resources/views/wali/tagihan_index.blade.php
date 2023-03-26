@extends('layouts.app_sneat_wali')

@section('content')
		<div class="row justify-content-center">
				<div class="col-md-12">
						<div class="card">
								<h5 class="card-header">DATA TAGIHAN SPP</h5>

								<div class="card-body">
										<a href="#" class="btn btn-sm btn-primary">Tambah Data</a>
										<div class="table-responsive">
												<table class="table-striped table">
														<thead>
																<th>No</th>
																<th>NAMA</th>
																<th>JURUSAN</th>
																<th>KELAS</th>
																<th>TANGGAL TAGIHAN</th>
																<th>STATUS PEMBAYARAN</th>
																<th>AKSI</th>
														</thead>
														<tbody>
																@forelse ($tagihan as $item)
																		<tr>
																				<td>{{ $loop->iteration }}</td>
																				<td>{{ $item->siswa->nama }}</td>
																				<td>{{ $item->siswa->jurusan }}</td>
																				<td>{{ $item->siswa->kelas }}</td>
																				<td>{{ $item->tanggal_tagihan->translatedFormat('d F Y') }}</td>
																				<td>{{ $item->getStatusTagihanWali() }}</td>
																				<td>
																						@if ($item->status == 'baru' || $item->status == 'angsur')
																								<a href="{{ route('wali.tagihan.show', $item->id) }}" class="btn btn-sm btn-primary">Lakukan
																										Pembayaran</a>
																						@else
																								<a href="#" class="btn btn-sm btn-success">Pembayaran Sudah Lunas</a>
																						@endif
																				</td>
																				<td>
																				</td>
																		</tr>
																@empty
																		<tr>
																				<td colspan="7" class="text-danger text-center">Data tdak ada</td>
																		</tr>
																@endforelse
														</tbody>
												</table>
										</div>
								</div>
						</div>
				</div>
		</div>
@endsection
