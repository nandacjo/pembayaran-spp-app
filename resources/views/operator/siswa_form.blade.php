@extends('layouts.app_sneat')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header">{{ $title }}</h5>

      <div class="card-body">
        {!! Form::model($model, [
          'route' => $route, 
          'method' => $method, 
          'files'=> true
          ]) !!}

        <div class="form-group mt-3">
          <label for="wali_id">Nama Murid (optional)</label>
          {!! Form::select('wali_id', $wali, null, ['class' => 'form-control select2', 
          'placeholder' => 'Pilih Wali Murid']) !!}
          <span class="text-danger">{{ $errors->first('wali_id') }}</span>
        </div>

        <div class="form-group mt-3"> 
          <label for="nama">Nama</label>
          {!! Form::text('nama', null, ['class'=> 'form-control', 'autofocus']) !!}
          <span class="text-danger">{{ $errors->first('nama') }}</span>
        </div>
        <div class="form-group mt-3">
          <label for="email">Nisn</label>
          {!! Form::text('nisn', null, ['class'=> 'form-control', ]) !!}
          <span class="text-danger">{{ $errors->first('nisn') }}</span>
        </div>
        <div class="form-group mt-3">
          <label for="kelas">Kelas</label>
          {!! Form::selectRange('kelas', 1, 6, null, ['class' => 'form-control']) !!}
          <span class="text-danger">{{ $errors->first('kelas') }}</span>
        </div>

        <div class="form-group mt-3">
          <label for="jurusan">Jurusan</label>
          {!! Form::select('jurusan', [
            'RPL' => 'Rekayasa Perangkat Lunak',
            'TKJ' => 'Teknik Komputer Jaringan',
          ],  null, ['class' => 'form-control']) !!}
           
          <span class="text-danger">{{ $errors->first('jurusan') }}</span>
        </div>

        <div class="form-group mt-3">
          <label for="angkatan">Angkatan</label>
          {!! Form::selectRange('angkatan', 2018, date('Y') + 1, null, ['class' => 'form-control']) !!}
          <span class="text-danger">{{ $errors->first('angkatan') }}</span>
        </div>

        @if($model->foto != null)
          <div class="m-3">
            <img src="{{ \Storage::url($model->foto) }}" alt="" width="200" class="img-thumbnail">
          </div>
        @endif
      
        <div class="form-group mt-3">
          <label for="foto">Foto <strong class="text-bold">(Format: jpg, jpeg, png Ukurann: 5Mb)</strong></span> </label>
          {!! Form::file('foto', ['class'=> 'form-control', 'accept' => 'image/*']) !!}
          <span class="text-danger">{{ $errors->first('foto') }}</span>
        </div>
      
        {!! Form::submit($button, ['class' => 'btn btn-primary mt-3']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection
