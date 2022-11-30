@extends('layouts.app_sneat')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header">{{ $title }}</h5>

      <div class="card-body">
        <img src="{{ \Storage::url($model->foto ?? 'images/no-image') }}" alt="" width="200">
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th width="15%">ID</th>
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
</div>
@endsection
