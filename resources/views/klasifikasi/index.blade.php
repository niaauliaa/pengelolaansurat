@extends('layouts.template')

@section('container')

    @if(Session::get('success'))
        <div class="alert alert-success"> {{ Session::get('success') }}</div>
    @endif
    @if(Session::get('deleted'))
        <div class="alert alert-success"> {{ Session::get('deleted') }}</div>
    @endif

<table class="table table-striped table-bordered table-hover" style="margin-top: 10px;">
    <h2>Data Klasifikasi</h2>
    <div style="text-align: left">
        <a href="{{ route('klasifikasi.create') }}" class="btn btn-primary  me-auto-mb-3">Tambah</a>
        <a href="{{ route('export-excel') }}" class="btn btn-info text-white me-auto-mb-3">Export klasifikasi surat </a>
</div>

    <thead>
        <tr>
            <th>No</th>
            <th>Kode Surat</th>
            <th>Klasifikasi Surat</th>
            <th>Surat Tertaut</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($klasifikasi as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{$item['letter_code']}}</td>
                <td>{{$item['name_type']}}</td>
                <td></td>
                <td class="d-flex justify-content-center">
                    <a href="#" class="text-white btn btn-info me-3">Lihat</a>
                    <a href="{{ route('klasifikasi.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletemodal" id="deletemodal">Hapus</button>
                    
                    <div class="modal" tabindex="-1" id="deletemodal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Yakin ingin menghapus data ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('klasifikasi.delete', $item->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection