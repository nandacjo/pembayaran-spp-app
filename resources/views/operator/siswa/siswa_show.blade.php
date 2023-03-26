@extends('layouts.app_sneat')

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <h5 class="card-header">{{ $title }}</h5>

      <div class="card-body">
        <div class="d-flex justify-content-center">
          <img src="{{ \Storage::url($model->foto ?? 'images/no-image') }}" alt="" width="200" class="img-thumbnail rounded-circle mb-3">
        </div>
        <div class="table-responsive mt-3">
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th width="35%">ID</th>
                <td>{{ $model->id }}</td>
              </tr>
              <tr>
                <th>NAMA WALI</th>
                <td>{{ $model->wali->name }}</td>
              </tr>
              <tr>
                <th>NAMA</th>
                <td>{{ $model->nama }}</td>
              </tr>
              <tr>
                <th>NISN</th>
                <td>{{ $model->nisn }}</td>
              </tr>
              <tr>
                <th>JURUSAN</th>
                <td>{{ $model->jurusan }}</td>
              </tr>
              <tr>
                <th>ANGKATAN</th>
                <td>{{ $model->angkatan }}</td>
              </tr>
              <tr>
                <th>TGL BUAT</th>
                <td>{{ $model->created_at->format('d/m/Y H:i') }}</td>
              </tr>
              <tr>
                <th>TGL UBAH</th>
                <td>{{ $model->updated_at->format('d/m/Y H:i') }}</td>
              </tr>
              <tr>
                <th>DIBUAT OLEH</th>
                <td>{{ $model->user->name }}</td>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <h4 class="card-header">Jumlah Tagihan</h4>
      <div class="card-body">
        <table class="table table-sm table-bordered">
          <tr>
            <th>No</th>
            <th>Tagihan</th>
            <th>Jumlah</th>
            <th align="center">Kode Bayar</th>
          </tr>
          <tr>
            <td>1</td>
            <td>Uang Pangkal</td>
            <td>3.000.000</td>
            <td align="center">
              <a href="#" class="btn btn-sm btn-primary">Cetak</a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>SPP Semester Ganjil</td>
            <td>6.000.000</td>
            <td align="center">
              <a href="#" class="btn btn-sm btn-primary">Cetak</a>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
