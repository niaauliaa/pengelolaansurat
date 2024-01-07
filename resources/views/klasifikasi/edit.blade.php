@extends('layouts.template')

@section('container')
<form action="{{ route('klasifikasi.update', $klasifikasi['id'])}}" method="POST" class="card p-5">
    @csrf
    @method('PATCH')

    @if ($errors->any())
    <ul class="alert alert-danger p-3">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">kode Surat :</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="kodesurat" name="letter_code" value="{{ $klasifikasi['letter_code']}}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">klasifikasi Surat :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="klasifikasi" name="name_type" value="{{ $klasifikasi['name_type'] }}">
        </div>
    </div>
    <div style="text-align: right">
    <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
    </div>
</form>
@endsection