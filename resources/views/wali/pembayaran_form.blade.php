@extends('layouts.app_sneat_wali')
@section('js')
<script>
    $(document).ready(function () {
    $("#pilihBank").change(function (e) { 
        e.preventDefault();
        let bankId = $(this).find(":selected").val();
        window.location.href = "{!! $url !!}&bank_sekolah_id=" + bankId;
        // alert(bankId)
    });
});
</script>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">KONFIRMASI TAGIHAN PEMBAYARAN</h5>
            <div class="card-body">
                {!! Form::model($model, ['route' => $route, 'method' => $method, 'files' => true]) !!}
                <div class="form-group">
                    <label for="bank_id">Bank Tujuan Pembayaran</label>
                    {!! Form::select('bank_id', $listBank, request('bank_sekolah_id'), [
                    'class' => 'form-control',
                    'placeholder' => 'Pilih Bank Tujuan Tansfer',
                    'id'=> 'pilihBank'
                    ]) !!}
                    <small class="text-danger">{{ $errors->first('bank_id') }}</small>
                </div>
                @if(request('bank_sekolah_id') != '')
                <div class="col-md-12 mt-3">
                    <div class="alert alert-primary" role="alert">
                        <table class="table table-sm" width="100%">
                            <tr>
                                <th width="20%">Nama Bank</th>
                                <td class="text-start">: {{ $bankYangDipilih->nama_bank }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Rekening</th>
                                <td>: {{ $bankYangDipilih->nomor_rekening }}</td>
                            </tr>
                            <tr>
                                <th>Atas Nama</th>
                                <td>: {{ $bankYangDipilih->nama_rekening }}</td>
                            </tr>

                        </table>
                    </div>
                </div>
                @endif
                <div class="form-group mt-3">
                    <label for="tanggal_bayar">Tanggal</label>
                    {!! Form::date('tanggal_bayar', $tagihan->tanggal_tagihan ?? date('Y-m-d'), ['class' =>
                    'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('tanggal_bayar') }}</small>
                </div>

                <div class="form-group mt-3">
                    <label for="jumlah_dibayar">Jumlah Yang dibayarakan</label>
                    {!! Form::text('jumlah_dibayar', null, ['class' => 'form-control rupiah', 'placeholder' => 'Jumlah
                    yang dibayar']) !!}
                    <small class="text-danger">{{ $errors->first('jumlah_dibayar') }}</small>
                </div>
                <div class="form-group mt-3">
                    <label for="bukti_bayar">Bukti Pembayaran</label>
                    {!! Form::file('bukti_bayar', ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('bukti_bayar') }}</small>
                </div>
                {!! Form::submit('SIMPAN', ['class' => 'btn btn-primary mt-3']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection