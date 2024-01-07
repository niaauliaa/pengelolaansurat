@extends('layouts.template')

@section('container')
    <form action="{{ route('datasurat.store') }}" method="POST" class="card p-5">
        @csrf
        @if(Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }} </div>
        @endif
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="row">
            <div class="col">
                <label for="form-label" for="perihal">Perihal</label>
                <input type="text" class="form-control"  aria-label="First name">
            </div>
            <div class="col-md-5">
                <label for="inputState" class="form-label">Klasifikasi Surat</label>
                <select id="inputState" class="form-select">
                    <option selected disabled hidden>Pilih</option>
                        @foreach ($surat as $item)
                            <option value="{{ $item->letter_type_id }}"> {{ $item->name_type }}</option>
                        @endforeach
                    </select>
            </div>
        </div>
            <div class="mb-3">
                <label for="content" class="form-label">Isi Surat </label>
                <div class="col-sm-10">
                    <textarea name="content" id="des" cols="100" rows="10"></textarea>
                    @error('container')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div> 
            <div class="mb-3">
                <label for="agenda" class="form-label">Agenda</label>
                <textarea class="form-control" id="agenda" name="agenda" rows="3"></textarea>
            </div> 
            <div class="mb-3">
                <label for="lampiran" class="form-label">Lampiran</label>
                <input class="form-control" type="file" id="lampiran">
            </div>
            <div class="mb-3">
                <label for="notulis" class="form-label">Notulis</label>
                <select id="notulis" class="form-select">
                    <option selected disabled hidden>Pilih</option>
                    @foreach ($surat as $item)
                        <option value="{{ $item->id}}">{{ $item->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
            <script>
                ClassicEditor
                    .create(document.querySelector('#des'))
                    .catch(error => {
                        console.error(error)
                    });
            </script>
    </form>
@endsection

