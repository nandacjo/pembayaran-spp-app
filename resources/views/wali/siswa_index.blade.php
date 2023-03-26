@extends('layouts.app_sneat_wali')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header">DATA SISWA</h5>

      <div class="card-body">
        <a href="#" class="btn btn-sm btn-primary">Tambah Data</a>
        <div class="table-responsive">
          <table class="table-striped table">
            <thead>
              <th>No</th>
              <th>NAMA WALI MURID</th>
              <th>NAMA SISWA</th>
              <th>NISN</th>
              <th>JURUSAN</th>
              <th>KELAS</th>
              <th>ANGKATAN</th>
              <th>DIBUAT OLEH</th>
            </thead>
            <tbody>
              @forelse ($models as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->wali->name }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->jurusan }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->angkatan }}</td>
                <td>{{ $item->user->name }}</td>
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
