@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Data User</h5>

                <div class="card-body">
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                 <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No. HP</th>
                            <th>Email</th>
                            <th>Akses</th>
                        </thead>
                        <tbody>
                            @forelse ($models as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->nohp }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->akses }}</td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="4">Data tdak ada</td>
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
