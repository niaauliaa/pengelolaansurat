@extends('layouts.template')

    @section('container')
    
    <div class="jumbotron py-4 px-5">
    @if(Session::get ('cannotAccess'))
        <div class="alert alert-danger">{{ Session::get('cannotAccess') }}</div>
    @endif
    <h1 class="display-4">
        Selamat Datang!
    </h1>
    <hr class="my-4">
    <p>Aplikasi ini digunakan hanya oleh Staff TU dan Guru. Digunakan untuk mengelola surat.</p>
</div>


<div class="row">
    <div class="col-xl col-md-6">
        <div class="card bg-primary text-white mb-6">
            <div class="card-body">
               Surat Keluar
            </div>
            <div class="card-footer d-flex align-items-cnter justify-content-between">
                <h2><i class="bi bi-file-text-fill"></i>{{ App\Models\letters::all()->count() }}</h2>
            </div>
        </div>
    </div>
    <div class="col-xl col-md-6">
        <div class="card bg-primary text-white mb-6">
            <div class="card-body">
               Klasifikasi Surat
            </div>
            <div class="card-footer d-flex align-items-cnter justify-content-between">
                <h2><i class="bi bi-file-text-fill"></i>{{ App\Models\letter_types::all()->count() }}</h2>
            </div>
        </div>
    </div>
    <div class="col-xl col-md-6">
        <div class="card bg-primary text-white mb-6">
            <div class="card-body">
                Staff Tata Usaha
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <h2><i class="bi bi-person-fill"></i>{{ App\Models\User::where('role', 'staff')->count() }}</h2>
            </div>
        </div>
    </div>
    <div class="col-xl col-md-6">
        <div class="card bg-primary text-white mb-6">
            <div class="card-body">
                Guru
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <h2><i class="bi bi-person-fill"></i>{{ App\Models\User::where('role', 'guru')->count() }}</h2>
            </div>
        </div>
    </div>
</div>


@endsection

