@extends('layouts.template')

@section('container')
    <form action="{{ route('guru.update', $guru['id'])}}" method="POST" class="card p-5">
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
        <label for="name" class="col-sm-2 col-form-label">Nama :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ $guru['name'] }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email :</label>
        <div class="col-sm-10">
            <input type="text" name="email" class="form-control" id="email" email="email" value="{{ $guru['email'] }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="role" class="col-sm-2 col-form-label">Tipe Pengguna :</label>
        <div class="col-sm-10">
            <select class="form-select" id="role" name="role">
                <option value="staff" {{ $guru['role'] == 'staff' ? 'selected' : '' }}>Staff</option>
                <option value="guru" {{ $guru['role'] == 'guru' ? 'selected' : '' }}>Guru</option>
            </select>
        </div>
    </div>
        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Ubah Password :</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
        <div style="text-align: right">
            <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
        </div>
</form>
@endsection