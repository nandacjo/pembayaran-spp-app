@extends('layouts.app_sneat')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header">{{ $title }}</h5>

      <div class="card-body">
        <a href="{{ route($routePrefix . '.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
        <div class="table-responsive">

          <table class="table-striped table">
            <thead>
              <th>No</th>
              <th>Nama Bank</th>
              <th>Kode Transfer</th>
              <th>Pemilik Rekening</th>
              <th>Nama Rekening</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              @forelse ($models as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_bank }}</td>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->nama_rekening }}</td>
                <td>{{ $item->nama_rekening }}</td>
                <td>
                  {!! Form::open([
                  'route' => [$routePrefix . '.destroy', $item->id],
                  'method' => 'DELETE',
                  'onsubmit' => 'return confirm("Yakin ingin menghapus data ini?")',
                  ]) !!}
                  <a href="{{ route($routePrefix . '.edit', $item->id) }}" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> Edit </a>

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
          {!! $models->links() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
