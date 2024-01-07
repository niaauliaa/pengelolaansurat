@extends('layouts.template')

@section('container')

@if(Session::get('success'))
    <div class="alert alert-success"> {{Session::get('success')}}</div>
@endif
@if(Session::get('deleted'))
    <div class="alert alert-warning"> {{Session::get('deleted')}}</div>
@endif

<table class="table table-striped table-bordered tabel-hover">
        <h2>Data Surat</h2>
        <div style="text-align: left">
        <a href="{{ route('datasurat.create')}}" class="btn btn-primary ms-auto mb-3"> Tambah Data Surat</a>
    </div>
    <thead>
        <tr>
            <th>No</th>
            <th>No Surat</th>
            <th>Perihal</th>
            <th>Tanggal Keluar</th>
            <th>Penerima Surat</th>
            <th>Notulis</th>
            <th>Hasil Rapat</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <body>
        @php $no = 1; @endphp
        @foreach ($surat as $item)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$item['letter_type_id']}}</td>
            <td>{{$item['letter_perihal']}}</td>
            <td>{{$item['recipient']}}</td>
            <td>{{$item['content']}}</td>
            <td>{{$item['attachment']}}</td>
            <td>{{$item['notulis']}}</td>
            <td></td>
            <td class="d-flex justify-content-center">
                <a href="#" class="btn btn-primary me-3">Edit</a>
                <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->id}}">
                    Hapus
                </button>
                
            </td>
        </tr>
        
        <div class="modal fade" id="exampleModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <form action="#" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" >Hapus</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
                    @endforeach
                </table>
                </tbody>
        @endsection