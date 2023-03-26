@extends('layouts.app_sneat')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header">{{ $title }}</h5>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th width="15%">ID</th>
                <td>{{ $model->id }}</td>
              </tr>
              <tr>
                <th>NAMA</th>
                <td>{{ $model->name }}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>{{ $model->email }}</td>
              </tr>
              <tr>
                <th>Nomor HP</th>
                <td>{{ $model->nphp ?? '-' }}</td>
              </tr>
              <tr>
                <th>TGL BUAT</th>
                <td>{{ $model->created_at->format('d/m/Y H:i') }}</td>
              </tr>
              <tr>
                <th>TGL UBAH</th>
                <td>{{ $model->updated_at->format('d/m/Y H:i') }}</td>
              </tr>
            </thead>
          </table>

          {{-- Form tambah data siswa --}}
          <h5 class="my-3">TAMBAH DATA ANAK</h5>
          {!! Form::open(['route' => 'walisiswa.store', 'method' => 'POST']) !!}
          {!! Form::hidden('wali_id', $model->id, []) !!}
          <div class="form-group">
            <label for="siswa_id">Pilih Data Siswa</label>
            {!! Form::select('siswa_id', $siswa, null, ['class' =>'form-control select2']) !!}
            <span class="text-danger">{{ $errors->first('siswa_id') }}</span>
          </div>
          {!! Form::submit('SIMPAN', ['class' => 'btn btn-sm btn-primary my-2']) !!}
          {!! Form::close() !!}
          {{-- end from tambah data siswa --}}


          <h5 class="my-4">DATA ANAK</h5>
          <table class="table table-light">
            <thead>
              <tr>
                <th>ID</th>
                <th>NISN</th>
                <th>NAMA</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($model->siswa as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->nama }}</td>
                <td>
                  {!! Form::open([
                  'route' => ['walisiswa.update', $item->id],
                  'method' => 'PUT',
                  'onsubmit' => 'return confirm("Yakin ingin menghapus data ini?")',
                  ]) !!}

                  <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Hapus
                  </button>
                  {!! Form::close() !!}

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
